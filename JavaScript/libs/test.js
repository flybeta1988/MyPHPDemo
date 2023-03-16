function $(id) {
    return document.getElementById(id);
}
function init() {
    var g = 'ggg';
}
init();
function hello() {
    window.alert("操作成功");
    $("course_name").value = 'aaabb';
}
function testFloat() {
    var a = 0.1, b = 0.2;
    var z = a + b;
    console.log('a + b = ' + z)
    if (0.3 == z) {
        console.log('ok');
    } else {
        console.log('fail');
    }
}
function tryThrow() {
    try {
        var a;
        if (undefined == a) {
            throw "a is not defined!";
        }
        var r = a.b;
        console.log(r);
    } catch (e) {
        console.log(e.valueOf())
    } finally {
        console.log('aaa')
    }
}
function Course(id, name, status) {
    this.id = id;
    this.name = name;
    this.status = status;
}
var liveCourse = new Course(100, 'test01', 1);
Course.prototype.orgId = 1000;
Course.prototype.add = function () {
    console.log('add ok!');
}
console.log(liveCourse.orgId);
liveCourse.add();

class Order {
    constructor(id) {
        this.id = id;
    }
    static hello() {
        console.log('order.hello...');
    }
    get id() {
        return this.id;
    }
    set id(id) {
        this.id = id;
    }
}
Order.hello();

function addClickEvent() {
    document.getElementById("testBtn").addEventListener('click', function () {
        console.log('I come from testBtn');
    })
}

function getDataFromServer() {
    Ajax.request({
        url: "http://127.0.0.1:8081/ajax/index.php",
        success: function (result) {
            console.log('result:' + result.name);
            console.log("ajax success." + Utils.randomNum(1000, 9999));
        },
        error: function (error) {
            console.log(error);
        }
    });
    console.log("getDataByServer end!");
}
