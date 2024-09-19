<?php
// Copyright (c) 2018 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg, GPLv3, see LICENSE

class ilExamOrgaCronPlugin extends ilCronHookPlugin
{
	function getPluginName(): string
	{
		return "ExamOrgaCron";
	}

	function getCronJobInstances(): array
	{
		return array($this->getCronJobInstance('exam_orga_cron'));
	}

	function getCronJobInstance($a_job_id): ilExamOrgaCronJob
	{
		return new ilExamOrgaCronJob($this);
	}

	/**
	 * Do checks bofore activating the plugin
	 * @return bool
	 * @throws ilPluginException
	 */
	function beforeActivation(): bool
	{
		global $DIC;
		
		if (!$this->checkOrgaPluginActive()) {
			$DIC->ui()->mainTemplate()->setOnScreenMessage('failure', $this->txt("message_orga_plugin_missing"), true);
			// this does not show the message
			// throw new ilPluginException($this->txt("message_creator_plugin_missing"));
			return false;
		}

		return parent::beforeActivation();
	}

	/**
	 * Check if the orga plugin is active
	 * @return bool
	 */
	public function checkOrgaPluginActive(): bool
	{		
		global $DIC;

		/** @var ilComponentFactory $factory */
		$factory = $DIC["component.factory"];
	
		/** @var ilPlugin $plugin */
		foreach ($factory->getActivePluginsInSlot('robj') as $plugin) {
			if ($plugin->getPluginName() == 'ExamOrga') {
				return $plugin->isActive();
			}
		}
		return false;			
	}

	/**
	 * Get the creator plugin object
	 * @return ilPlugin
	 */
	public function getOrgaPlugin(): mixed
	{
		global $DIC;

        /** @var ilComponentFactory $factory */
        $factory = $DIC["component.factory"];

		return $factory->getPlugin('xamo');		
	}
}