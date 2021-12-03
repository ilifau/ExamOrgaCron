# ExamOrgaCron

Copyright (c) 2020 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg
GPLv3, see LICENSE

Author: Fred Neumann <fred.neumann@ili.fau.de>


This plugin for the LMS ILIAS open source provides a cron job task for the ExamAdmin plugin.

It requires an installation of the ExamOrga plugin:
https://github.com/ilifau/ExamOrga


INSTALLATION
------------
1. Put the content of the plugin directory in a subdirectory under your ILIAS main directory:
Customizing/global/plugins/Services/Cron/CronHook/ExamOrgaCron

2. Open ILIAS > Administration > Plugins

3. Update/Activate the plugin


CONFIGURATION
-------------

You need to set up a call of the ILIAS cron jobs on your web server, see the ILIAS installation guide:
https://www.ilias.de/docu/goto_docu_pg_8240_367.html

1. Go to Administration > General Settings > Cron Jobs

2. Activate the 'Exam Organisation' cron job

3. Set a reasonable schedule for the job, e.h. hourly.


USAGE
-----

See the documentation of the ExamOrga plugin.


VERSIONS
--------
