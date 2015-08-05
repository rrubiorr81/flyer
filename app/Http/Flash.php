<?php

namespace App\Http;


class Flash {

    /**
     * Creating generic flash message
     * @param string $title
     * @param string $message
     * @param string $level
     * @param string $key
     */
    public function create($title, $message, $level, $key = "flash_message")
    {
        session()->flash($key, [
            'title'     => $title,
            'message'   => $message,
            'level'     => $level
        ]);
    }

    /**
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    /**
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    /**
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

    /**
     * @param $title
     * @param $message
     * @param string $level
     */
    public function overlay($title, $message, $level = "success")
    {
        $this->create($title, $message, $level, "flash_message_overlay");
    }

}