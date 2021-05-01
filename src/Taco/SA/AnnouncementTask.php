<?php namespace Taco\SA;

use pocketmine\scheduler\Task;

class AnnouncementTask extends Task {

	/**
	 * @var Main
	 */
	private $plugin;

	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
	}

	/**
	 * @param int $currentTick
	 */
	public function onRun(int $currentTick) : void {
		$config = $this->plugin->config;
		$announcement = $config["announcements"][array_rand($config["announcements"])];
		$online = count($this->plugin->getServer()->getOnlinePlayers());
		foreach($this->plugin->getServer()->getOnlinePlayers() as $player) {
			$player->sendMessage(str_replace(["{name}", "{online}", "{br}", "{ping}"], [$player->getName(), $online, "\n", $player->getPing()], $announcement));
		}
	}

}