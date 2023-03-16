<?php
use Swoole\Coroutine;
use Swoole\Database\PDOConfig;
use Swoole\Database\PDOPool;
use Swoole\Coroutine\Channel;

class CourseService
{
    private $course_list;

    public function getPDOPool() {
        static $pool;
        if (null != $pool) {
            //echo __METHOD__. " old pool \n";
            return $pool;
        } else {
            //Runtime::enableCoroutine();
            $pool = new PDOPool((new PDOConfig)
                ->withHost('127.0.0.1')
                ->withPort(6306)
                ->withDbName('xnw')
                ->withCharset('utf8mb4')
                ->withUsername('root')
                ->withPassword('root'),
                128
            );
            echo __METHOD__. " new pool\n";
            return $pool;
        }
    }

    private function pushCourseList(array $courses) {
        $this->course_list[] = $courses;
    }

    private function getSql1() :string {
        //return "select id,wid from weibo_footprint order by id asc limit 130000, 1";
        return "select id,wid from weibo_footprint where id > 130000 order by id asc limit 1";
    }

    private function getSql2() :string {
        //return "select id,wid from weibo_footprint order by id asc limit 140000, 1";
        return "select id,wid from weibo_footprint where id > 140000 order by id asc limit 1";
    }

    private function getSql3() :string {
        //return "select id,wid from weibo_footprint order by id asc limit 150000, 1";
        return "select id,wid from weibo_footprint where id > 150000 order by id asc limit 1";
    }

    public function getCourseList() {
        try {
            $db = new PDO('mysql:host=127.0.0.1;port=6306;dbname=xnw', 'root', 'root');
        } catch (Exception $e) {
            die("mysql连接失败");
        }

        $stmt1 = $db->query($this->getSql1());
        $result1 = $stmt1->fetchAll(PDO::FETCH_OBJ);

        $stmt2 = $db->query($this->getSql2());
        $result2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

        $stmt3 = $db->query($this->getSql3());
        $result3 = $stmt3->fetchAll(PDO::FETCH_OBJ);

        return array_merge($result1, $result2, $result3);
    }

    private function commonCoroutine($courseChannel) {

        $pool = $this->getPDOPool();

        Coroutine::create(function () use ($pool, $courseChannel) {
            echo date('Y-m-d H:i:s'). " push1 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql1());

            //Coroutine::sleep(2);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            //压数据到通道
            if ($courseChannel->push($result)) {
                echo date('Y-m-d H:i:s'). " push1 ok result: ". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);
        });

        Coroutine::create(function () use ($pool, $courseChannel) {
            echo date('Y-m-d H:i:s'). " push2 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql2());
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($courseChannel->push($result)) {
                echo date('Y-m-d H:i:s'). " push2 ok result:". var_export($result, true);
            }
            $pool->put($pdo);
        });
    }

    /**
     * 消费者进程有限次取值
     * @return array
     */
    public function getCourseListV2() {

        $course_list = [];

        $channel = new Channel(100);

        $this->commonCoroutine($channel);

        for($i = 1; $i <= 2; $i ++) {
            echo "\n";
            echo date('Y-m-d H:i:s'). " pop{$i} start...\n";
            $data = $channel->pop();
            if ($data) {
                $course_list[] = $data;
                echo date('Y-m-d H:i:s'). " pop{$i} ok\n";
            } else {
                echo date('Y-m-d H:i:s'). " pop{$i} channel empty!\n";
                break;
            }
        }

        return $course_list ? array_merge(...$course_list) : [];
    }

    /**
     * 消费者独立协程
     * @return array
     */
    public function getCourseListV3() {

        $course_list = [];

        $channel = new Channel(100);

        $this->commonCoroutine($channel);

        Coroutine::create(function () use ($channel, &$course_list) {
            while (1) {
                echo "\n";
                echo date('Y-m-d H:i:s'). " pop start...\n";

                $data = $channel->pop();
                if ($data) {
                    $course_list[] = $data;
                    echo date('Y-m-d H:i:s'). " pop ok\n";
                } else {
                    echo date('Y-m-d H:i:s'). " pop channel empty!\n";
                    break;
                }
                print_r($course_list);
            }
        });

        return $course_list ? array_merge(...$course_list) : [];
    }

    public function getCourseListByWaitGroup() {

        $course_list = [];
        $pool = $this->getPDOPool();
        $waitGroup = new Coroutine\WaitGroup();

        //方法增加计数
        $waitGroup->add();
        Coroutine::create(function () use ($pool, $waitGroup, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push1 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql1());

            //Coroutine::sleep(2);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push1 ok result: ". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);

            //任务已完成
            $waitGroup->done();
        });

        $waitGroup->add();
        Coroutine::create(function () use ($waitGroup, $pool, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push2 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql2());
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push2 ok result:". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);

            $waitGroup->done();
        });

        $waitGroup->add();
        Coroutine::create(function () use ($waitGroup, $pool, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push2 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql3());
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push2 ok result:". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);

            $waitGroup->done();
        });

        //挂起当前协程，等待所有任务完成后恢复
        $waitGroup->wait();

        return $course_list ? array_merge(...$course_list) : [];
    }

    public function getCourseListByBarrier() {

        $barrier = Coroutine\Barrier::make();

        $course_list = [];
        $pool = $this->getPDOPool();

        Coroutine::create(function () use ($barrier, $pool, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push1 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql1());

            //Coroutine::sleep(2);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push1 ok result: ". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);
        });

        Coroutine::create(function () use ($barrier, $pool, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push2 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql2());
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push2 ok result:". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);
        });

        Coroutine::create(function () use ($barrier, $pool, &$course_list) {
            //echo date('Y-m-d H:i:s'). " push2 start ...\n";
            $pdo = $pool->get();
            $statement = $pdo->query($this->getSql3());
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $course_list[] = $result;
                //echo date('Y-m-d H:i:s'). " push2 ok result:". var_export($result, true);
            }

            //释放db连接
            $pool->put($pdo);
        });

        Coroutine\Barrier::wait($barrier);

        return $course_list ? array_merge(...$course_list) : [];
    }
}