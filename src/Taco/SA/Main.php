<?php namespace Taco\SA;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	/**
	 * @var array
	 */
	public $config;

	public function onEnable() : void {
		$this->config = (array)$this->getConfig()->getAll();
		$this->getScheduler()->scheduleRepeatingTask(new AnnouncementTask($this), 20 * (int)$this->config["timer"]);
	}

}