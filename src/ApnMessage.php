<?php

namespace NotificationChannels\Apn;

use DateTime;
use Pushok\Client;

class ApnMessage
{
    /**
     * The title of the notification.
     *
     * @var string
     */
    public $title;

    /**
     * The body of the notification.
     *
     * @var string
     */
    public $body;

    /**
     * The badge of the notification.
     *
     * @var int
     */
    public $badge;

    /**
     * The sound for the notification.
     *
     * @var string|null
     */
    public $sound;

    /**
     * The category for action button.
     *
     * @var string|null
     * */
    public $category;

    /**
     * Value indicating incoming resource in the notification.
     *
     * @var int|null
     */
    public $contentAvailable = null;

    /**
     * Additional data of the notification.
     *
     * @var array
     */
    public $custom = [];

    /**
     * Value indicating when the message will expire.
     *
     * @var \string
     */
    public $pushType = null;

    /**
     * The expiration time of the notification.
     *
     * @var \DateTime|null
     */
    public $expiresAt = null;

    /**
     * Message specific client.
     *
     * @var \Pushok\Client|null
     */
    public $client = null;

    /**
     * The notification service app extension flag.
     *
     * @var int|null
     */
    public $mutableContent = null;

    /**
     * @param string|null $title
     * @param string|null $body
     * @param array $custom
     * @param null|int $badge
     *
     * @return static
     */
    public static function create($title = null, $body = null, $custom = [], $badge = null)
    {
        return new static($title, $body, $custom, $badge);
    }

    /**
     * @param string|null $title
     * @param string|null $body
     * @param array $custom
     * @param null|int $badge
     */
    public function __construct($title = null, $body = null, $custom = [], $badge = null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->custom = $custom;
        $this->badge = $badge;
    }

    /**
     * Set the alert title of the notification.
     *
     * @param string $title
     *
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the alert message of the notification.
     *
     * @param string $body
     *
     * @return $this
     */
    public function body($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Set the badge of the notification.
     *
     * @param int $badge
     *
     * @return $this
     */
    public function badge($badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Set the sound for the notification.
     *
     * @param string|null $sound
     *
     * @return $this
     */
    public function sound($sound = 'default')
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * Set category for this notification.
     *
     * @param string|null $category
     *
     * @return $this
     * */
    public function category($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Set content available value for this notification.
     *
     * @param int $value
     *
     * @return $this
     */
    public function contentAvailable($value = 1)
    {
        $this->contentAvailable = $value;

        return $this;
    }

    /**
     * Set the push type for this notification.
     *
     * @param  string  $pushType
     *
     * @return $this
     */
    public function pushType(string $pushType)
    {
        $this->pushType = $pushType;

        return $this;
    }

    /**
     * Set the expiration time for the message.
     *
     * @param  \DateTime  $expiresAt
     *
     * @return $this
     */
    public function expiresAt(DateTime $expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Add custom data to the notification.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return $this
     */
    public function custom($key, $value)
    {
        $this->custom[$key] = $value;

        return $this;
    }

    /**
     * Override the data of the notification.
     *
     * @param array $custom
     *
     * @return $this
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Add an action to the notification.
     *
     * @param string $action
     * @param mixed $params
     *
     * @return $this
     */
    public function action($action, $params = null)
    {
        return $this->custom('action', [
            'action' => $action,
            'params' => $params,
        ]);
    }

    /**
     * Set message specific client.
     *
     * @param \Pushok\Client
     * @return $this
     */
    public function via(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set mutable content value for this notification.
     *
     * @param int $value
     *
     * @return $this
     */
    public function mutableContent($value = 1)
    {
        $this->mutableContent = $value;

        return $this;
    }
}
