<?php
// Copyright (c) 2018 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg, GPLv3, see LICENSE

class ilExamOrgaCronPlugin extends ilCronHookPlugin
{
	function getPluginName()
	{
		return "ExamOrgaCron";
	}

	function getCronJobInstances()
	{
		return array($this->getCronJobInstance('exam_orga_cron'));
	}

	function getCronJobInstance($a_job_id)
	{
		$this->includeClass('class.ilExamOrgaCronJob.php');
		return new ilExamOrgaCronJob($this);
	}

	/**
	 * Do checks bofore activating the plugin
	 * @return bool
	 * @throws ilPluginException
	 */
	function beforeActivation()
	{
		if (!$this->checkOrgaPluginActive()) {
			ilUtil::sendFailure($this->txt("message_orga_plugin_missing"), true);
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
	public function checkOrgaPluginActive()
	{
		global $DIC;
		/** @var ilPluginAdmin $ilPluginAdmin */
		$ilPluginAdmin = $DIC['ilPluginAdmin'];

		return $ilPluginAdmin->isActive('Services', 'Repository', 'robj', 'ExamOrga');
	}

	/**
	 * Get the creator plugin object
	 * @return ilPlugin
	 */
	public function getOrgaPlugin()
	{
		return ilPluginAdmin::getPluginObject('Services', 'Repository', 'robj', 'ExamOrga');
	}
}