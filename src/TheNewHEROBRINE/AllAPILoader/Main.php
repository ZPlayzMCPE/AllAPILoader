<?php

namespace TheNewHEROBRINE\AllAPILoader;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoadOrder;
use TheNewHEROBRINE\AllAPILoader\Loaders\AllFolderPluginLoader;
use TheNewHEROBRINE\AllAPILoader\Loaders\AllPharPluginLoader;

class Main extends PluginBase {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerInterface(AllPharPluginLoader::class);

        if ($this->getServer()->getPluginManager()->getPlugin("DevTools") instanceof Plugin or $this->getServer()->getPluginManager()->getPlugin("FolderPluginLoader") instanceof Plugin)
            $this->getServer()->getPluginManager()->registerInterface(AllFolderPluginLoader::class);

        $this->getServer()->getPluginManager()->loadPlugins($this->getServer()->getPluginPath(), [AllPharPluginLoader::class, AllFolderPluginLoader::class]);
        $this->getServer()->enablePlugins(PluginLoadOrder::STARTUP);
    }
}
