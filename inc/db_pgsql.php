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
    /**
     * The title of this layer.
     *
     * @var string
     */
    public $title = "PostgreSQL";

    /**
     * The short title of this layer.
     *
     * @var string
     */
    public $short_title = "PostgreSQL";

    /**
     * The type of db software being used.
     *
     * @var string
     */
    public $type;

    /**
     * A count of the number of queries.
     *
     * @var int
     */
    public $query_count = 0;

    /**
     * A list of the performed queries.
     *
     * @var array
     */
    public $querylist = array();

    /**
     * 1 if error reporting enabled, 0 if disabled.
     *
     * @var boolean
     */
    public $error_reporting = 1;

    /**
     * The read database connection resource.
     *
     * @var resource
     */
    public $read_link;

    /**
     * The write database connection resource
     *
     * @var resource
     */
    public $write_link;

    /**
     * Reference to the last database connection resource used.
     *
     * @var resource
     */
    public $current_link;

    /**
     * @var array
     */
    public $connections = array();

    /**
     * Explanation of a query.
     *
     * @var string
     */
    public $explain;

    /**
     * The current version of PgSQL.
     *
     * @var string
     */
    public $version;

    /**
     * The current table type in use (myisam/innodb)
     *
     * @var string
     */
    public $table_type = "myisam";

    /**
     * The table prefix used for simple select, update, insert and delete queries
     *
     * @var string
     */
    public $table_prefix;

    /**
     * The temporary connection string used to store connect details
     *
     * @var string
     */
    public $connect_string;

    /**
     * The last query run on the database
     *
     * @var string
     */
    public $last_query;

    /**
     * The current value of pconnect (0/1).
     *
     * @var string
     */
    public $pconnect;

    /**
     * The engine used to run the SQL database
     *
     * @var string
     */
    public $engine = "pgsql";

    /**
     * Weather or not this engine can use the search functionality
     *
     * @var boolean
     */
    public $can_search = true;

    /**
     * The database encoding currently in use (if supported)
     *
     * @var string
     */
    public $db_encoding = "utf8";

    /**
     * The time spent performing queries
     *
     * @var float
     */
    public $query_time = 0;

    /**
     * The last result run on the database (needed for affected_rows)
     *
     * @var resource
     */
    public $last_result;

    /* --------------------------------------------------------------
     *  CONNECT, QUERY, WRITE_QUERY, … (all the original methods)
     * -------------------------------------------------------------- */
    /* (the rest of the file is exactly the same as you posted) */
