<?php

/**
 *
 * Configuration file, generated by the iTop configuration wizard
 *
 * The file is used in MetaModel::LoadConfig() which does all the necessary initialization job
 *
 */
$MySettings = array(

	// access_message: Message displayed to the users when there is any access restriction
	//	default: 'iTop is temporarily frozen, please wait... (the admin team)'
	'access_message' => 'iTop is temporarily frozen, please wait... (the admin team)',

	// access_mode: Combination of flags (ACCESS_USER_WRITE | ACCESS_ADMIN_WRITE, or ACCESS_FULL)
	//	default: 3
	'access_mode' => 3,

	'allowed_login_types' => 'form|basic|external',

	// apc_cache.enabled: If set, the APC cache is allowed (the PHP extension must also be active)
	//	default: true
	'apc_cache.enabled' => true,

	// apc_cache.query_ttl: Time to live set in APC for the prepared queries (seconds - 0 means no timeout)
	//	default: 3600
	'apc_cache.query_ttl' => 3600,

	// app_root_url: Root URL used for navigating within the application, or from an email to the application (you can put $SERVER_NAME$ as a placeholder for the server's name)
	//	default: ''
	'app_root_url' => 'https://alltic.co/AT-WFM-MX/',

	// buttons_position: Position of the forms buttons: bottom | top | both
	//	default: 'both'
	'buttons_position' => 'both',

	// cas_include_path: The path where to find the phpCAS library
	//	default: '/usr/share/php'
	'cas_include_path' => '/usr/share/php',

	// cron_max_execution_time: Duration (seconds) of the page cron.php, must be shorter than php setting max_execution_time and shorter than the web server response timeout
	//	default: 600
	'cron_max_execution_time' => 600,

	// csv_file_default_charset: Character set used by default for downloading and uploading data as a CSV file. Warning: it is case sensitive (uppercase is preferable).
	//	default: 'ISO-8859-1'
	'csv_file_default_charset' => 'ISO-8859-1',

	'csv_import_charsets' => array (
	),

	// csv_import_history_display: Display the history tab in the import wizard
	//	default: false
	'csv_import_history_display' => false,

	'db_character_set' => 'utf8',

	'db_collation' => 'utf8_unicode_ci',

	'db_host' => 'alltic.co',

	'db_name' => 'alltic_wfm_mx',

	'db_pwd' => 'itop2019',

	'db_subname' => '',

	'db_user' => 'itop',

	// deadline_format: The format used for displaying "deadline" attributes: any string with the following placeholders: $date$, $difference$
	//	default: '$difference$'
	'deadline_format' => '$difference$',

	'default_language' => 'ES CR',

	// email_asynchronous: If set, the emails are sent off line, which requires cron.php to be activated. Exception: some features like the email test utility will force the serialized mode
	//	default: false
	'email_asynchronous' => false,

	// email_transport: Mean to send emails: PHPMail (uses the function mail()) or SMTP (implements the client protocole)
	//	default: 'PHPMail'
	'email_transport' => 'PHPMail',

	// email_validation_pattern: Regular expression to validate/detect the format of an eMail address
	//	default: '[a-zA-Z0-9._&\'-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z0-9-]{2,}'
	'email_validation_pattern' => '[a-zA-Z0-9._&\'-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z0-9-]{2,}',

	'encryption_key' => '@iT0pEncr1pti0n!',

	'ext_auth_variable' => '$_SERVER[\'REMOTE_USER\']',

	'fast_reload_interval' => '60',

	// graphviz_path: Path to the Graphviz "dot" executable for graphing objects lifecycle
	//	default: '/usr/bin/dot'
	'graphviz_path' => 'C:\\Program Files (x86)\\Graphviz 2.28\\bin\\dot.exe',

	// link_set_attribute_qualifier: Link set from string: attribute qualifier (encloses both the attcode and the value)
	//	default: '\''
	'link_set_attribute_qualifier' => '\'',

	// link_set_attribute_separator: Link set from string: attribute separator
	//	default: ';'
	'link_set_attribute_separator' => ';',

	// link_set_item_separator: Link set from string: line separator
	//	default: '|'
	'link_set_item_separator' => '|',

	// link_set_value_separator: Link set from string: value separator (between the attcode and the value itself
	//	default: ':'
	'link_set_value_separator' => ':',

	'log_global' => true,

	'log_issue' => true,

	'log_notification' => true,

	'log_queries' => false,

	'log_web_service' => true,

	'max_display_limit' => '15',

	// max_linkset_output: Maximum number of items shown when getting a list of related items in an email, using the form $this->some_list$. 0 means no limit.
	//	default: 100
	'max_linkset_output' => 100,

	'min_display_limit' => '10',

	// online_help: Hyperlink to the online-help web page
	//	default: 'http://www.combodo.com/itop-help'
	'online_help' => 'http://www.combodo.com/itop-help',

	// php_path: Path to the php executable in CLI mode
	//	default: 'php'
	'php_path' => 'php',

	// portal_tickets: CSV list of classes supported in the portal
	//	default: 'UserRequest'
	'portal_tickets' => 'UserRequest',

	'query_cache_enabled' => true,

	'secure_connection_required' => false,

	// session_name: The name of the cookie used to store the PHP session id
	//	default: 'iTop'
	'session_name' => 'iTop',

	// shortcut_actions: Actions that are available as direct buttons next to the "Actions" menu
	//	default: 'UI:Menu:Modify,UI:Menu:New'
	'shortcut_actions' => 'UI:Menu:Modify,UI:Menu:New',

	// source_dir: Source directory for the datamodel files. (which gets compiled to env-production).
	//	default: ''
	'source_dir' => 'datamodels/2.x/',

	'standard_reload_interval' => '300',

	// synchro_trace: Synchronization details: none, display, save (includes 'display')
	//	default: 'none'
	'synchro_trace' => 'none',

	// timezone: Timezone (reference: http://php.net/manual/en/timezones.php). If empty, it will be left unchanged and MUST be explicitely configured in PHP
	//	default: 'Europe/Paris'
	'timezone' => 'Europe/Paris',

	// tracking_level_linked_set_default: Default tracking level if not explicitely set at the attribute level, for AttributeLinkedSet (defaults to NONE in case of a fresh install, LIST otherwise - this to preserve backward compatibility while upgrading from a version older than 2.0.3 - see TRAC #936)
	//	default: 1
	'tracking_level_linked_set_default' => 0,

	// url_validation_pattern: Regular expression to validate/detect the format of an URL (URL attributes and Wiki formatting for Text attributes)
	//	default: '(https?|ftp)\\://([a-zA-Z0-9+!*(),;?&=\\$_.-]+(\\:[a-zA-Z0-9+!*(),;?&=\\$_.-]+)?@)?([a-zA-Z0-9-.]{3,})(\\:[0-9]{2,5})?(/([a-zA-Z0-9%+\\$_-]\\.?)+)*/?(\\?[a-zA-Z+&\\$_.-][a-zA-Z0-9;:[\\]@&%=+/\\$_.-]*)?(#[a-zA-Z_.-][a-zA-Z0-9+\\$_.-]*)?'
	'url_validation_pattern' => '(https?|ftp)\\://([a-zA-Z0-9+!*(),;?&=\\$_.-]+(\\:[a-zA-Z0-9+!*(),;?&=\\$_.-]+)?@)?([a-zA-Z0-9-.]{3,})(\\:[0-9]{2,5})?(/([a-zA-Z0-9%+\\$_-]\\.?)+)*/?(\\?[a-zA-Z+&\\$_.-][a-zA-Z0-9;:[\\]@&%=+/\\$_.-]*)?(#[a-zA-Z_.-][a-zA-Z0-9+\\$_.-]*)?',
);

/**
 *
 * Modules specific settings
 *
 */
$MyModuleSettings = array(
	'itop-attachments' => array (
		'allowed_classes' => array (
		  0 => 'Ticket',
		),
		'position' => 'relations',
		'preview_max_width' => 290,
	),
	'itop-backup' => array (
		'mysql_bindir' => '',
		'week_days' => 'monday, tuesday, wednesday, thursday, friday',
		'time' => '23:30',
		'retention_count' => 5,
		'enabled' => true,
		'debug' => false,
	),
	'combodo-sla-computation' => array (
		'coverage_oql' => 'SELECT CoverageWindow',
		'holidays_oql' => 'SELECT Holiday',
	),
	'combodo-email-synchro' => array (
		'debug' => true,
		'periodicity' => 30,
		'notify_errors_to' => '',
		'notify_errors_from' => '',
		'introductory-patterns' => array (
		  0 => '/^le .+ a écrit :$/i',
		  1 => '/^on .+ wrote:$/i',
		  2 => '|^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2} .+:$|',
		),
	),
	'itop-simple-email-synchro' => array (
		'protocol' => 'POP3',
		'mail_server' => 'alltic.co',
		'port' => 110,
		'login' => 'jmartinez@alltic.co',
		'pwd' => 'Jaime1982',
		'mailbox' => '',
		'pop3_auth_option' => 'USER',
		'imap_options' => array (
		  0 => 'imap',
		),
		'debug' => true,
		'create_only' => false,
		'exclude_attachment_types' => array (
		  0 => 'application/exe',
		),
		'ticket_class' => 'UserRequest',
		'default_values' => array (
		),
		'parts_order' => 'text/plain,text/html',
		'title_pattern' => '/R-([0-9]+)/',
	),
	'authent-ldap' => array (
		'host' => 'localhost',
		'port' => 389,
		'default_user' => '',
		'default_pwd' => '',
		'base_dn' => 'dc=yourcompany,dc=com',
		'user_query' => '(&(uid=%1$s)(inetuserstatus=ACTIVE))',
		'options' => array (
		  17 => 3,
		  8 => 0,
		),
		'start_tls' => false,
		'debug' => false,
	),
);

/**
 *
 * Data model modules to be loaded. Names are specified as relative paths
 *
 */
$MyModules = array(
	'application' => array (
		'application/transaction.class.inc.php',
		'application/menunode.class.inc.php',
		'application/user.preferences.class.inc.php',
		'application/user.dashboard.class.inc.php',
		'application/audit.rule.class.inc.php',
		'application/query.class.inc.php',
		'core/event.class.inc.php',
		'core/action.class.inc.php',
		'core/trigger.class.inc.php',
		'core/bulkexport.class.inc.php',
		'core/ownershiplock.class.inc.php',
		'synchro/synchrodatasource.class.inc.php',
		'core/backgroundtask.class.inc.php',
		'env-production/core/main.php',
	),
	'business' => array (
		'env-production/authent-external/model.authent-external.php',
		'env-production/authent-ldap/model.authent-ldap.php',
		'env-production/authent-local/model.authent-local.php',
		'env-production/combodo-email-synchro/model.email-synchro.php',
		'env-production/itop-attachments/model.itop-attachments.php',
		'env-production/itop-attachments/main.attachments.php',
		'env-production/itop-backup/main.itop-backup.php',
		'env-production/itop-config-mgmt/model.itop-config-mgmt.php',
		'env-production/itop-config-mgmt/main.itop-config-mgmt.php',
		'env-production/itop-config/main.itop-config.php',
		'env-production/itop-profiles-itil/model.itop-profiles-itil.php',
		'env-production/itop-simple-mail-synchro/model.itop-simple-email-synchro.php',
		'env-production/itop-sla-computation/main.itop-sla-computation.php',
		'env-production/itop-tickets/main.itop-tickets.php',
		'env-production/itop-tickets/model.itop-tickets.php',
		'env-production/itop-welcome-itil/main.itop-welcome-itil.php',
		'env-production/itop-welcome-itil/model.itop-welcome-itil.php',
		'env-production/combodo-sla-computation/model.combodo-sla-computation.php',
		'env-production/itop-request-mgmt-itil/model.itop-request-mgmt-itil.php',
		'env-production/itop-request-mgmt-itil/main.itop-request-mgmt-itil.php',
		'env-production/itop-service-mgmt-provider/model.itop-service-mgmt-provider.php',
		'env-production/portal-module/model.portal-module.php',
		'env-production/requerimiento-module/model.requerimiento-module.php',
		'env-production/requerimientov2-module/model.requerimientov2-module.php',
		'env-production/combodo-coverage-windows-computation/main.combodo-coverage-windows-computation.php',
		'env-production/coordenadas-module/model.coordenadas-module.php',
	),
	'webservices' => array (
		'webservices/webservices.basic.php',
	),
	'addons' => array (
		'user rights' => 'addons/userrights/userrightsprofile.class.inc.php',
	),
	'dictionaries' => array (
		'dictionaries/it.dictionary.itop.ui.php',
		'dictionaries/cs.dictionary.itop.core.php',
		'dictionaries/de.dictionary.itop.ui.php',
		'dictionaries/nl.dictionary.itop.core.php',
		'dictionaries/ja.dictionary.itop.core.php',
		'dictionaries/fr.dictionary.itop.ui.php',
		'dictionaries/dictionary.itop.core.php',
		'dictionaries/cs.dictionary.itop.ui.php',
		'dictionaries/es_cr.dictionary.itop.ui.php',
		'dictionaries/dictionary.itop.ui.php',
		'dictionaries/de.dictionary.itop.core.php',
		'dictionaries/da.dictionary.itop.ui.php',
		'dictionaries/hu.dictionary.itop.core.php',
		'dictionaries/es_cr.dictionary.itop.core.php',
		'dictionaries/ja.dictionary.itop.ui.php',
		'dictionaries/da.dictionary.itop.core.php',
		'dictionaries/ru.dictionary.itop.ui.php',
		'dictionaries/pt_br.dictionary.itop.core.php',
		'dictionaries/tr.dictionary.itop.core.php',
		'dictionaries/nl.dictionary.itop.ui.php',
		'dictionaries/tr.dictionary.itop.ui.php',
		'dictionaries/zh.dictionary.itop.ui.php',
		'dictionaries/pt_br.dictionary.itop.ui.php',
		'dictionaries/zh.dictionary.itop.core.php',
		'dictionaries/ru.dictionary.itop.core.php',
		'dictionaries/fr.dictionary.itop.core.php',
		'dictionaries/it.dictionary.itop.core.php',
		'dictionaries/hu.dictionary.itop.ui.php',
		'env-production/dictionaries/cs-cz.dict.php',
		'env-production/dictionaries/da-da.dict.php',
		'env-production/dictionaries/de-de.dict.php',
		'env-production/dictionaries/en-us.dict.php',
		'env-production/dictionaries/es-cr.dict.php',
		'env-production/dictionaries/fr-fr.dict.php',
		'env-production/dictionaries/hu-hu.dict.php',
		'env-production/dictionaries/it-it.dict.php',
		'env-production/dictionaries/ja-jp.dict.php',
		'env-production/dictionaries/nl-nl.dict.php',
		'env-production/dictionaries/pt-br.dict.php',
		'env-production/dictionaries/ru-ru.dict.php',
		'env-production/dictionaries/tr-tr.dict.php',
		'env-production/dictionaries/zh-cn.dict.php',
	),
);
?>