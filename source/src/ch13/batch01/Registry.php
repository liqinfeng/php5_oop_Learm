<?php
declare(strict_types = 1);

namespace popp\ch13\batch01;

use popp\ch12\batch06\Conf;
use popp\ch12\batch06\Request;
use popp\ch12\batch06\ApplicationHelper;

class Registry
{
    private static $instance=null;
    private $request = null;
    private $conf = null;
    private $commands = null;
    private $pdo = null;
    private $applicationHelper = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function reset()
    {
        self::$instance = null;
    }

    // must be initialized by some smarter component
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("No Request set");
        }

        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setConf(Conf $conf)
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands)
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        return $this->commands;
    }

    public function getDSN(): string
    {
        $conf = $this->getConf();
        return $conf->get("dsn");
    }

    public function getPdo(): \PDO
    {
        if (is_null($this->pdo)) {
            $dsn = $this->getDSN();

            if (is_null($dsn)) {
                throw new AppException("No DSN");
            }

            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

/* listing 13.10 */

    public function getVenueMapper(): VenueMapper
    {
        return new VenueMapper();
    }

    public function getSpaceMapper(): SpaceMapper
    {
        return new SpaceMapper();
    }

    public function getEventMapper(): EventMapper
    {
        return new EventMapper();
    }

    public function getVenueCollection(): VenueCollection
    {
        return new VenueCollection();
    }

    public function getSpaceCollection(): SpaceCollection
    {
        return new SpaceCollection();
    }

    public function getEventCollection(): EventCollection
    {
        return new EventCollection();
    }

/* /listing 13.10 */
}
