<?php
namespace Thb\Xhgui;

class Extension
{
    private $db;

    public function __construct(\MongoDB $db)
    {
        $this->db = $db;
    }

    public function start()
    {
        if (!function_exists('xhprof_enable')) {
            return false;
        } else {
            xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
            return true;
        }
    }

    public function save($url)
    {
        if (!function_exists('xhprof_disable')) {
            return false;
        }

        $data['profile'] = xhprof_disable();

        $time = isset($_SERVER['REQUEST_TIME']) ? $_SERVER['REQUEST_TIME'] : time();
        $microtime = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime(true);

        $data['meta'] = array(
            'url' => $url,
            'SERVER' => $_SERVER,
            'get' => $_GET,
            'env' => $_ENV,
            'simple_url' => $url,
            'request_ts' => new \MongoDate($time),
            'request_ts_micro' => new \MongoDate($microtime),
            'request_date' => date('Y-m-d', $time),
        );

        $this->db->results->insert($data, array('w' => false));
        return true;
    }
}
