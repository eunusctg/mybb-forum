<?php
/**
 * MyBB 1.8
 * Copyright 2014 MyBB Group, All Rights Reserved
 */

class DB_PgSQL implements DB_Base
{
    public $title = "PostgreSQL";
    public $short_title = "PostgreSQL";
    public $type;
    public $query_count = 0;
    public $querylist = array();
    public $error_reporting = 1;
    public $read_link;
    public $write_link;
    public $current_link;
    public $connections = array();
    public $explain;
    public $version;
    public $table_type = "myisam";
    public $table_prefix;
    public $connect_string;
    public $last_query;
    public $pconnect;
    public $engine = "pgsql";
    public $can_search = true;
    public $db_encoding = "utf8";
    public $query_time = 0;
    public $last_result;

    function connect($config)
    {
        // ... [all your existing connect() code] ...

        // Successful connection? Set PostgreSQL to accept MySQL backticks
        if ($this->read_link) {
            if (getenv('MYSQL_EMULATE') === '1' || (defined('IN_INSTALLER') && IN_INSTALLER)) {
                $this->write_query("SET standard_conforming_strings = off");
                $this->write_query("SET backslash_quote = on");
            }
        }

        $this->current_link = &$this->read_link;
        return $this->read_link;
    }

    // ... [rest of your methods: query(), write_query(), etc.] ...
}
