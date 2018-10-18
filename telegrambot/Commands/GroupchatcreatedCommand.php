<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\SystemCommands;

use Longman\TelegramBot\Commands\SystemCommand;

/**
 * Group chat created command
 *
 * Gets executed when a group chat is created.
 */
class GroupchatcreatedCommand extends SystemCommand
{
    /**
     * @var string
     */
    protected $name = 'groupchatcreated';

    /**
     * @var string
     */
    protected $description = 'Group chat created';

    /**
     * @var string
     */
    protected $version = '1.1.0';

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $message = $this->getMessage();
        $group_chat_created = $message->getGroupChatCreated();
        $chat_id = $message->getChat()->getId();
        $user_id = $message->getFrom()->getId();
        $command = $message->getCommand();
        $res=fopen("res.txt","a");
        fwrite($res,"chat_id=".$chat_id."\n");
        fwrite($res,"user_id=".$user_id."\n");
        fwrite($res,"command=".$command."\n");
        fwrite($res,"group_chat_created=".$group_chat_created."\n");

        return parent::execute();
    }
}
