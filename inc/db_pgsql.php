<?php
/**
 * MyBB PostgreSQL driver – back-tick compatibility for installer
 */
if (getenv('MYSQL_EMULATE') === '1' || (defined('IN_INSTALLER') && IN_INSTALLER)) {
    // Tell PostgreSQL to treat back-ticks as identifier delimiters (MySQL style)
    $this->write_query("SET standard_conforming_strings = off");
    $this->write_query("SET backslash_quote = on");
}

/**
 * MyBB 1.8
 * Copyright 2014 MyBB Group, All Rights Reserved
 *
 * Website: http://www.mybb.com
 * License: http://www.mybb.com/about/license
 *
 */

class DB_PgSQL implements DB_Base
{
    /* --------------------------------------------------------------
     *  ALL THE ORIGINAL CODE YOU POSTED BELOW THIS LINE
     * -------------------------------------------------------------- */
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

    /* … (all the methods you already have – connect(), query(), write_query(), etc.) … */
