<?php

namespace Services\Omniture;

use Services\AbstractClientlessService;
use Services\Exception\RuntimeException;
use Services\Exception\TimeoutException;
use Zend\Stdlib\ErrorHandler;

class Omniture extends AbstractClientlessService
{
    /**
     * Channel
     *
     * @var string
     */
    protected $channel;

    /**
     * Omniture eVars
     * @var array
     */
    protected $eVars;

    /**
     * Omniture events
     * @var array
     */
    protected $events;

    /**
     *Hier1
     *
     * @var string
     */
    protected $hier1;

    /**
     * Internal filters for link tracking
     * @var string
     */
    protected $internalFilters = 'javascript:';

    /**
     * Lists
     * @var array
     */
    protected $lists;

    /**
     * Page name
     *
     * @var string
     */
    protected $pageName;

    /**
     * Page type
     *
     * @var string
     */
    protected $pageType;

    /**
     * Products string
     * @var string
     */
    protected $products;

    /**
     * Omniture props
     * @var array
     */
    protected $props;

    /**
     * Purchase ID
     *
     * @var string
     */
    protected $purchaseID;

    /**
     * Omniture servers (suites)
     * @var string
     */
    protected $servers;

    /**
     * State
     *
     * @var string
     */
    protected $state;

    /**
     * First party tracking server (leave empty for third-party)
     * @var string
     */
    protected $trackingServer = '';

    /**
     * First party tracking server (leave empty for third-party)
     * @var string
     */
    protected $trackingServerSecure = '';

    /**
     * Visitor ID
     * @var string
     */
    protected $visitorID;

    /**
     * MCOrg ID
     * @var string
     */
    protected $mcOrgID;

    /**
     * Omniture Namespace - should probably always be bizjournals
     * @var string
     */
    protected $visitorNamespace = 'bizjournals';

    /**
     * Zip
     *
     * @var string
     */
    protected $zip;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct($options = array())
    {
        if (isset($options['visitor_namespace'])) {
            $this->visitorNamespace = $options['visitor_namespace'];
        }

        if (isset($options['tracking_server'])) {
            $this->trackingServer = $options['tracking_server'];
        }

        if (isset($options['tracking_server_secure'])) {
            $this->trackingServerSecure = $options['tracking_server_secure'];
        }

        if (isset($options['servers'])) {
            $this->setServers($options['servers']);
        }

        if (isset($options['internal_filters'])) {
            $this->setInternalFilters($options['internal_filters']);
        }

        if (isset($options['mcorg_id'])) {
            $this->mcOrgID = $options['mcorg_id'];
        }
    }

    /**
     * Get channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Get a specific eVar value
     * @param string $eVarName
     */
    public function getEvar($eVarName = '')
    {
        return $this->eVars[$evarName];
    }

    /**
     * Get all eVars
     * @return array
     */
    public function getEvars()
    {
        return $this->eVars;
    }

    /**
     * Return list of events
     * @return array events
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Get hier1
     *
     * @return string
     */
    public function getHier1()
    {
        return $this->hier1;
    }

    /**
     * Return internal filters for link tracking
     * @return string
     */
    public function getInternalFilters()
    {
        return $this->internalFilters;
    }

    /**
     * Get a specific list value
     * @param string $listName
     */
    public function getList($listName = '')
    {
        return $this->lists[$listName];
    }

    /**
     * Get all lists
     * @return array
     */
    public function getLists()
    {
        return $this->lists;
    }

    /**
     * Get page name
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Get page type
     *
     * @return string
     */
    public function getPageType()
    {
        return $this->pageType;
    }

    /**
     * Get product string
     *
     * @return string
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Get a specific prop value
     * @param string $propName
     */
    public function getProp($propName = '')
    {
        return $this->props[$propName];
    }

    /**
     * Get all props
     * @return array
     */
    public function getProps()
    {
        return $this->props;
    }

    /**
     * Get purchase ID
     *
     * @return string
     */
    public function getPurchaseID()
    {
        return $this->purchaseID;
    }

    /**
     * Get all defined servers
     * @return array
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get visitor ID
     *
     * @return string
     */
    public function getVisitorID()
    {
        return $this->visitorID;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }


    /**
     * Set channel
     *
     * @param string
     */
    public function setChannel($channel = '')
    {
        $this->channel = $channel;
    }

    /**
     * Set a specific eVar value
     * @param string $eVarName
     * @param string $eVarValue
     */
    public function setEvar($evarName = '', $eVarValue = '')
    {
        $this->eVars[$evarName] = $eVarValue;
    }

    /**
     * Set all eVars (merges)
     * @param array $eVars
     */
    public function setEvars($eVars = array())
    {
        $this->eVars = array_merge($this->eVars, $eVars);
    }

    /**
     * Set all events (merges)
     * @param array $events
     */
    public function setEvents($events = array())
    {
        $this->events = array_merge($this->events, $events);
    }

    /**
     * Set hier1
     *
     * @param string
     */
    public function setHier1($hier1 = '')
    {
        $this->hier1 = $hier1;
    }

    /**
     * Set internal filters for link tracking
     * @param string $filters
     */
    public function setInternalFilters($filters = '')
    {
        $this->internalFilters = $filters;
    }

    /**
     * Set a specific list value
     * @param string $listName
     * @param string $listValue
     */
    public function setList($listName = '', $listValue = '')
    {
        $this->lists[$listName] = $listValue;
    }

    /**
     * Set all lists (merges)
     * @param array $lists
     */
    public function setLists($lists = array())
    {
        $this->lists = array_merge($this->lists, $lists);
    }

    /**
     * Set page name
     *
     * @param string
     */
    public function setPageName($pageName = '')
    {
        $this->pageName = $pageName;
    }

    /**
     * Set page type
     *
     * @param string
     */
    public function setPageType($pageType = '')
    {
        $this->pageType = $pageType;
    }


    /**
     * Set product string
     *
     * @param string
     */
    public function setProducts($products = '')
    {
        $this->products = $products;
    }

    /**
     * Set a specific prop value
     * @param string $propName
     * @param string $propValue
     */
    public function setProp($propName = '', $propValue = '')
    {
        $this->props[$propName] = $propValue;
    }

    /**
     * Set all props (merges)
     * @param array $props
     */
    public function setProps($props = array())
    {
        $this->props = array_merge($this->props, $props);
    }

    /**
     * Set purchase ID
     *
     * @param string
     */
    public function setPurchaseID($purchaseID = '')
    {
        $this->purchaseID = $purchaseID;
    }

    /**
     * Set servers. dev will be appended for development env
     * @param array $servers
     */
    public function setServers($servers = array())
    {
        $appEnv = getenv('APPLICATION_ENV');
        if (!is_array($servers)) {
            $servers = array($servers);
        }
        foreach ($servers as &$server) {
            if ($appEnv != 'production') {
                $server .= 'dev';
            }
        }
        $this->servers = $servers;
    }

    /**
     * Set state
     *
     * @param string
     */
    public function setState($state = '')
    {
        $this->state = $state;
    }

    /**
     * Set visitor ID
     *
     * @param string
     */
    public function setVisitorID($visitorID = '')
    {
        $this->visitorID = $visitorID;
    }

    /**
     * Set zip
     *
     * @param string
     */
    public function setZip($zip= '')
    {
        $this->zip = $zip;
    }


    /**
     * Set a specific event
     * @param string $eventName like 'event1'
     */
    public function addEvent($eventName = '')
    {
        $this->events[$eventName] = true;
    }

    /**
     * Remove an event
     * @param string $eventName
     */
    public function removeEvent($eventName = '')
    {
        unset($this->events[$propName]);
    }

    /**
     * Get setup variables. This sets up omniture settings in javascript
     * @param array $options
     * @throws \Services\Exception\RuntimeException
     * @return string javascript
     */
    public function getSetup($options = array())
    {
        $tag = '';
        $tag .= "s.visitor=Visitor.getInstance(\"{$this->mcOrgID}\");\n";
        $tag .= "s.currentYear=\"" . date('Y') . "\";\n";
        $dstStart = date("m/d/Y", strtotime("Second Sunday March 0"));
        $tag .= "s.dstStart=\"{$dstStart}\";\n";
        $dstEnd = date("m/d/Y", strtotime("First Sunday November 0"));
        $tag .= "s.dstEnd=\"{$dstEnd}\";\n";

        $filters = $this->getInternalFilters();
        //@TODO allow overriding the below if needed
        $tag .= <<<HEREDOC

s.linkInternalFilters="{$filters}";

HEREDOC;
        return $tag;
    }

    /**
     * Get javascript instance string. This is used to start an omniture instance and
     * create the s variable. It could thereotically be called multiple times for different
     * markets
     * @param array $options
     * @throws \Services\Exception\RuntimeException
     * @return string javascript
     */
    public function getInstance($options = array())
    {
        if (empty($this->servers)) {
            throw new \Services\Exception\RuntimeException('Servers not set for Omniture getInstance');
        }
        $serverData = join(',', $this->servers);

        return "s_account = \"$serverData\";\n";
    }

    /**
     * Get the omniture tracking tag/code
     * @param array $options
     * @return string javascript
     */
    public function getTrack($options = array())
    {
        $tag = '';
        $pageName = $this->pageName;
        $tag .= "s.pageName = \"" . str_replace('"', '\"', $pageName) . "\";\n";

        $hier1 = $this->hier1;

        if (empty($hier1)) {
            $hier1 = explode(':', $pageName);
            array_pop($hier1);
        }

        $hier1out = is_array($hier1) ? $hier1 : explode(',', $hier1);
        $channel = $this->channel;
        if (empty($this->channel) && !empty($hier1out[0])) {
            $channel = $hier1out[0];
        }
        $props[1] = str_replace('"', '\"', $channel);
        $eVars[1] = "D=c1";
        $tag .= "s.channel = \"{$channel}\";\n";

        $tag .= "s.hier1 = \"" . str_replace('"', '\"', join(',', $hier1out)) . "\";\n";

        // props
        if (!empty($this->props)) {
            foreach ($this->props as $propKey => $propVal) {
                $tag .= "s.prop{$propKey} = \"" . str_replace('"', '\"', $propVal) . "\";\n";
            }
        }

        // eVars
        if (!empty($this->eVars)) {
            foreach ($this->eVars as $eVarKey => $eVarVal) {
                $tag .= "s.eVar{$eVarKey} = \"" . str_replace('"', '\"', $eVarVal) . "\";\n";
            }
        }

        // events
        if (!empty($this->events)) {
            $tag .= "s.events = \"" . join(',', array_keys($this->events)) . "\";\n";
        }

        // lists
        if (!empty($this->lists)) {
            foreach ($this->lists as $listKey => $listVal) {
                $tag .= "s.list{$listKey} = \"" . str_replace('"', '\"', $listVal) . "\";\n";
            }
        }

        if (!empty($this->visitorID)) {
            $tag .= "s.visitorID = \"{$this->visitorID}\";\n";
        }

        if (!empty($this->purchaseID)) {
            $tag .= "s.purchaseID = \"{$this->purchaseID}\";\n";
        }

        if (!empty($this->products)) {
            $tag .= "s.products = \"" . str_replace('"', '\"', $this->products) . "\";\n";
        }

        if (!empty($this->state)) {
            $tag .= "s.state = \"" . str_replace('"', '\"', $this->state) . "\";\n";
        }

        if (!empty($this->zip)) {
            $tag .= "s.zip = \"" . str_replace('"', '\"', $this->zip) . "\";\n";
        }

        if (!empty($this->pageType)) {
            $tag .= "s.pageType = \"{$this->pageType}\";\n";
        }

        return $tag;
    }


    /**
     * Trigger track
     *
     * @return string javascript
     */
    public function triggerTrack()
    {
        return "var s_code=s.t();if(s_code)document.write(s_code)\n";
    }
}
