<?php
require_once "../vendor/autoload.php";

$config = \Jaeger\Config::getInstance();
$tracer = $config->initTracer('example', '0.0.0.0:6831');

$config->gen128bit();
$spanContext = $tracer->extract(OpenTracing\Formats\TEXT_MAP, $_SERVER);
$serverSpan = $tracer->startSpan('example HTTP', ['child_of' => $spanContext]);
$serverSpan->addBaggageItem("version", "2.0.0");

// tags are searchable in Jaeger UI
$span->setTag('http.status', '200');

// log record
$span->log(['error' => 'HTTP request timeout']);




