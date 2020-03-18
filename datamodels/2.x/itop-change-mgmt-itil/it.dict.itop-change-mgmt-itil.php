<?php
// Copyright (C) 2010-2012 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>

/**
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('IT IT', 'Italian', 'Italiano', array(
	'Class:RoutineChange' => 'Routine di cambi',
	'Class:RoutineChange+' => '',
	'Class:RoutineChange/Stimulus:ev_validate' => 'Convalida',
	'Class:RoutineChange/Stimulus:ev_validate+' => '',
	'Class:RoutineChange/Stimulus:ev_reject' => 'Respingi',
	'Class:RoutineChange/Stimulus:ev_assign' => 'Assegna',
	'Class:RoutineChange/Stimulus:ev_assign+' => '',
	'Class:RoutineChange/Stimulus:ev_reopen' => 'Riapri',
	'Class:RoutineChange/Stimulus:ev_reopen+' => '',
	'Class:RoutineChange/Stimulus:ev_plan' => 'Pianifica',
	'Class:RoutineChange/Stimulus:ev_plan+' => '',
	'Class:RoutineChange/Stimulus:ev_approve' => 'Approva',
	'Class:RoutineChange/Stimulus:ev_replan' => 'Ripianifica',
	'Class:RoutineChange/Stimulus:ev_replan+' => '',
	'Class:RoutineChange/Stimulus:ev_notapprove' => 'Non Approva',
	'Class:RoutineChange/Stimulus:ev_implement' => 'Implementa',
	'Class:RoutineChange/Stimulus:ev_implement+' => '',
	'Class:RoutineChange/Stimulus:ev_monitor' => 'Monitora',
	'Class:RoutineChange/Stimulus:ev_monitor+' => '',
	'Class:RoutineChange/Stimulus:ev_finish' => 'Fine',
	'Class:RoutineChange/Stimulus:ev_finish+' => '',
	'Class:NormalChange' => 'Cambi normali',
	'Class:NormalChange+' => '',
	'Class:NormalChange/Attribute:acceptance_date' => 'Data di approvazione',
	'Class:NormalChange/Attribute:acceptance_date+' => '',
	'Class:NormalChange/Attribute:acceptance_comment' => 'Commento di approvazione',
	'Class:NormalChange/Attribute:acceptance_comment+' => '',
	'Class:NormalChange/Stimulus:ev_validate' => 'Convalida',
	'Class:NormalChange/Stimulus:ev_validate+' => '',
	'Class:NormalChange/Stimulus:ev_reject' => 'Rifiuta',
	'Class:NormalChange/Stimulus:ev_reject+' => '',
	'Class:NormalChange/Stimulus:ev_assign' => 'Assegna',
	'Class:NormalChange/Stimulus:ev_assign+' => '',
	'Class:NormalChange/Stimulus:ev_reopen' => 'Riapre',
	'Class:NormalChange/Stimulus:ev_reopen+' => '',
	'Class:NormalChange/Stimulus:ev_plan' => 'Pianifica',
	'Class:NormalChange/Stimulus:ev_plan+' => '',
	'Class:NormalChange/Stimulus:ev_approve' => 'Approva',
	'Class:NormalChange/Stimulus:ev_approve+' => '',
	'Class:NormalChange/Stimulus:ev_replan' => 'Ripianifica',
	'Class:NormalChange/Stimulus:ev_replan+' => '',
	'Class:NormalChange/Stimulus:ev_notapprove' => 'Rifiuta l\'approvazione',
	'Class:NormalChange/Stimulus:ev_notapprove+' => '',
	'Class:NormalChange/Stimulus:ev_implement' => 'Implementa',
	'Class:NormalChange/Stimulus:ev_implement+' => '',
	'Class:NormalChange/Stimulus:ev_monitor' => 'Monitora',
	'Class:NormalChange/Stimulus:ev_monitor+' => '',
	'Class:NormalChange/Stimulus:ev_finish' => 'Fine',
	'Class:NormalChange/Stimulus:ev_finish+' => '',
	'Class:EmergencyChange' => 'Cambi di emergenza',
	'Class:EmergencyChange+' => '',
	'Class:EmergencyChange/Stimulus:ev_validate' => 'Convalida',
	'Class:EmergencyChange/Stimulus:ev_validate+' => '',
	'Class:EmergencyChange/Stimulus:ev_reject' => 'Rifiuta',
	'Class:EmergencyChange/Stimulus:ev_reject+' => '',
	'Class:EmergencyChange/Stimulus:ev_assign' => 'Assegna',
	'Class:EmergencyChange/Stimulus:ev_assign+' => '',
	'Class:EmergencyChange/Stimulus:ev_reopen' => 'Riapre',
	'Class:EmergencyChange/Stimulus:ev_reopen+' => '',
	'Class:EmergencyChange/Stimulus:ev_plan' => 'Pianifica',
	'Class:EmergencyChange/Stimulus:ev_plan+' => '',
	'Class:EmergencyChange/Stimulus:ev_approve' => 'Approva',
	'Class:EmergencyChange/Stimulus:ev_approve+' => '',
	'Class:EmergencyChange/Stimulus:ev_replan' => 'Riapre',
	'Class:EmergencyChange/Stimulus:ev_replan+' => '',
	'Class:EmergencyChange/Stimulus:ev_notapprove' => 'Rifiuta l\'approvazione',
	'Class:EmergencyChange/Stimulus:ev_notapprove+' => '',
	'Class:EmergencyChange/Stimulus:ev_implement' => 'Implementa',
	'Class:EmergencyChange/Stimulus:ev_implement+' => '',
	'Class:EmergencyChange/Stimulus:ev_monitor' => 'Monitora',
	'Class:EmergencyChange/Stimulus:ev_monitor+' => '',
	'Class:EmergencyChange/Stimulus:ev_finish' => 'Fine',
	'Class:EmergencyChange/Stimulus:ev_finish+' => '',
	'Menu:ChangeManagement' => 'Gestione dei cambi',
	'Menu:Change:Overview' => 'Panoramica',
	'Menu:Change:Overview+' => '',
	'Menu:NewChange' => 'Nuovo cambio',
	'Menu:NewChange+' => 'Crea un ticket per un nuovo cambio',
	'Menu:SearchChanges' => 'Cerca per cambi',
	'Menu:SearchChanges+' => 'Cerca i cambi per tickets',
	'Menu:Change:Shortcuts' => 'Scorciatoie',
	'Menu:Change:Shortcuts+' => '',
	'Menu:WaitingAcceptance' => 'Modifiche in attesa di accettazione',
	'Menu:WaitingAcceptance+' => '',
	'Menu:WaitingApproval' => 'Modifiche in attesa di approvazione',
	'Menu:WaitingApproval+' => '',
	'Menu:Changes' => 'Modifiche aperte',
	'Menu:Changes+' => 'Tutte le Modifiche aperte',
	'Menu:MyChanges' => 'Modifiche assegnate a me',
	'Menu:MyChanges+' => 'Modifiche assegnato a me (come Agent)',
	'Class:Change' => 'Cambio',
	'Class:Change+' => '',
	'Class:Change/Attribute:start_date' => 'Avvio previsto',
	'Class:Change/Attribute:start_date+' => '',
	'Class:Change/Attribute:status' => 'Stato',
	'Class:Change/Attribute:status+' => '',
	'Class:Change/Attribute:status/Value:new' => 'Nuovo',
	'Class:Change/Attribute:status/Value:new+' => '',
	'Class:Change/Attribute:status/Value:validated' => 'Convalidato',
	'Class:Change/Attribute:status/Value:validated+' => '',
	'Class:Change/Attribute:status/Value:rejected' => 'Rifiutato',
	'Class:Change/Attribute:status/Value:rejected+' => '',
	'Class:Change/Attribute:status/Value:assigned' => 'Assegnato',
	'Class:Change/Attribute:status/Value:assigned+' => '',
	'Class:Change/Attribute:status/Value:plannedscheduled' => 'Pianificato e programmato',
	'Class:Change/Attribute:status/Value:plannedscheduled+' => '',
	'Class:Change/Attribute:status/Value:approved' => 'Approvato',
	'Class:Change/Attribute:status/Value:approved+' => '',
	'Class:Change/Attribute:status/Value:notapproved' => 'Non approvato',
	'Class:Change/Attribute:status/Value:notapproved+' => '',
	'Class:Change/Attribute:status/Value:implemented' => 'Implementato',
	'Class:Change/Attribute:status/Value:implemented+' => '',
	'Class:Change/Attribute:status/Value:monitored' => 'Monitorato',
	'Class:Change/Attribute:status/Value:monitored+' => '',
	'Class:Change/Attribute:status/Value:closed' => 'Chiuso',
	'Class:Change/Attribute:status/Value:closed+' => '',
	'Class:Change/Attribute:reason' => 'Motivo',
	'Class:Change/Attribute:reason+' => '',
	'Class:Change/Attribute:requestor_id' => 'Richiedente',
	'Class:Change/Attribute:requestor_id+' => '',
	'Class:Change/Attribute:requestor_email' => 'Richiedente',
	'Class:Change/Attribute:requestor_email+' => '',
	'Class:Change/Attribute:org_id' => 'Cliente',
	'Class:Change/Attribute:org_id+' => '',
	'Class:Change/Attribute:org_name' => 'Cliente',
	'Class:Change/Attribute:org_name+' => '',
	'Class:Change/Attribute:workgroup_id' => 'Gruppo di lavoro',
	'Class:Change/Attribute:workgroup_id+' => '',
	'Class:Change/Attribute:workgroup_name' => 'Gruppo di lavoro',
	'Class:Change/Attribute:workgroup_name+' => '',
	'Class:Change/Attribute:creation_date' => 'Creato',
	'Class:Change/Attribute:creation_date+' => '',
	'Class:Change/Attribute:last_update' => 'Ultimo aggiornamento',
	'Class:Change/Attribute:last_update+' => '',
	'Class:Change/Attribute:end_date' => 'Data di fine',
	'Class:Change/Attribute:end_date+' => '',
	'Class:Change/Attribute:close_date' => 'Chiuso',
	'Class:Change/Attribute:close_date+' => '',
	'Class:Change/Attribute:impact' => 'Impatto',
	'Class:Change/Attribute:impact+' => '',
	'Class:Change/Attribute:agent_id' => 'Agente',
	'Class:Change/Attribute:agent_id+' => '',
	'Class:Change/Attribute:agent_name' => 'Agente',
	'Class:Change/Attribute:agent_name+' => '',
	'Class:Change/Attribute:agent_email' => 'Agente',
	'Class:Change/Attribute:agent_email+' => '',
	'Class:Change/Attribute:supervisor_group_id' => 'Supervisore del team',
	'Class:Change/Attribute:supervisor_group_id+' => '',
	'Class:Change/Attribute:supervisor_group_name' => 'Supervisore del team',
	'Class:Change/Attribute:supervisor_group_name+' => '',
	'Class:Change/Attribute:supervisor_id' => 'Supervisore',
	'Class:Change/Attribute:supervisor_id+' => '',
	'Class:Change/Attribute:supervisor_email' => 'Supervisore',
	'Class:Change/Attribute:supervisor_email+' => '',
	'Class:Change/Attribute:manager_group_id' => 'Manager del team',
	'Class:Change/Attribute:manager_group_id+' => '',
	'Class:Change/Attribute:manager_group_name' => 'Manager del team',
	'Class:Change/Attribute:manager_group_name+' => '',
	'Class:Change/Attribute:manager_id' => 'Manager',
	'Class:Change/Attribute:manager_id+' => '',
	'Class:Change/Attribute:manager_email' => 'Manager',
	'Class:Change/Attribute:manager_email+' => '',
	'Class:Change/Attribute:outage' => 'Interruzione',
	'Class:Change/Attribute:outage+' => '',
	'Class:Change/Attribute:outage/Value:yes' => 'Si',
	'Class:Change/Attribute:outage/Value:yes+' => '',
	'Class:Change/Attribute:outage/Value:no' => 'No',
	'Class:Change/Attribute:outage/Value:no+' => '',
	'Class:Change/Attribute:change_request' => 'Richiesta',
	'Class:Change/Attribute:change_request+' => '',
	'Class:Change/Attribute:fallback' => 'Piano alternativo',
	'Class:Change/Attribute:fallback+' => '',
	'Class:Change/Stimulus:ev_validate' => 'Convalida',
	'Class:Change/Stimulus:ev_validate+' => '',
	'Class:Change/Stimulus:ev_reject' => 'Rifiuta',
	'Class:Change/Stimulus:ev_reject+' => '',
	'Class:Change/Stimulus:ev_assign' => 'Assegna',
	'Class:Change/Stimulus:ev_assign+' => '',
	'Class:Change/Stimulus:ev_reopen' => 'Riapre',
	'Class:Change/Stimulus:ev_reopen+' => '',
	'Class:Change/Stimulus:ev_plan' => 'Pianifica',
	'Class:Change/Stimulus:ev_plan+' => '',
	'Class:Change/Stimulus:ev_approve' => 'Approva',
	'Class:Change/Stimulus:ev_approve+' => '',
	'Class:Change/Stimulus:ev_replan' => 'Ripianifica',
	'Class:Change/Stimulus:ev_replan+' => '',
	'Class:Change/Stimulus:ev_notapprove' => 'Rifiuta',
	'Class:Change/Stimulus:ev_notapprove+' => '',
	'Class:Change/Stimulus:ev_implement' => 'Implementa',
	'Class:Change/Stimulus:ev_implement+' => '',
	'Class:Change/Stimulus:ev_monitor' => 'Monitora',
	'Class:Change/Stimulus:ev_monitor+' => '',
	'Class:Change/Stimulus:ev_finish' => 'Fine',
	'Class:Change/Stimulus:ev_finish+' => '',
	'Class:RoutineChange/Attribute:status/Value:new' => 'Nuovo',
	'Class:RoutineChange/Attribute:status/Value:new+' => '',
	'Class:RoutineChange/Attribute:status/Value:assigned' => 'Assegnato',
	'Class:RoutineChange/Attribute:status/Value:assigned+' => '',
	'Class:RoutineChange/Attribute:status/Value:plannedscheduled' => 'Pianificato e programmato',
	'Class:RoutineChange/Attribute:status/Value:plannedscheduled+' => '',
	'Class:RoutineChange/Attribute:status/Value:approved' => 'Approvato',
	'Class:RoutineChange/Attribute:status/Value:approved+' => '',
	'Class:RoutineChange/Attribute:status/Value:implemented' => 'Implementato',
	'Class:RoutineChange/Attribute:status/Value:implemented+' => '',
	'Class:RoutineChange/Attribute:status/Value:monitored' => 'Monitorato',
	'Class:RoutineChange/Attribute:status/Value:monitored+' => '',
	'Class:RoutineChange/Attribute:status/Value:closed' => 'Chiuso',
	'Class:RoutineChange/Attribute:status/Value:closed+' => '',
	'Class:ApprovedChange' => 'Cambi approvati',
	'Class:ApprovedChange+' => '',
	'Class:ApprovedChange/Attribute:approval_date' => 'Data di approvazione',
	'Class:ApprovedChange/Attribute:approval_date+' => '',
	'Class:ApprovedChange/Attribute:approval_comment' => 'Commento di approvazione',
	'Class:ApprovedChange/Attribute:approval_comment+' => '',
	'Class:ApprovedChange/Stimulus:ev_validate' => 'Convalida',
	'Class:ApprovedChange/Stimulus:ev_validate+' => '',
	'Class:ApprovedChange/Stimulus:ev_reject' => 'Rifiuta',
	'Class:ApprovedChange/Stimulus:ev_reject+' => '',
	'Class:ApprovedChange/Stimulus:ev_assign' => 'Assegna',
	'Class:ApprovedChange/Stimulus:ev_assign+' => '',
	'Class:ApprovedChange/Stimulus:ev_reopen' => 'Riapre',
	'Class:ApprovedChange/Stimulus:ev_reopen+' => '',
	'Class:ApprovedChange/Stimulus:ev_plan' => 'Pianifica',
	'Class:ApprovedChange/Stimulus:ev_plan+' => '',
	'Class:ApprovedChange/Stimulus:ev_approve' => 'Approvare',
	'Class:ApprovedChange/Stimulus:ev_approve+' => '',
	'Class:ApprovedChange/Stimulus:ev_replan' => 'Ripianifica',
	'Class:ApprovedChange/Stimulus:ev_replan+' => '',
	'Class:ApprovedChange/Stimulus:ev_notapprove' => 'Rifiuta l\'approvazione',
	'Class:ApprovedChange/Stimulus:ev_notapprove+' => '',
	'Class:ApprovedChange/Stimulus:ev_implement' => 'Implementa',
	'Class:ApprovedChange/Stimulus:ev_implement+' => '',
	'Class:ApprovedChange/Stimulus:ev_monitor' => 'Monitora',
	'Class:ApprovedChange/Stimulus:ev_monitor+' => '',
	'Class:ApprovedChange/Stimulus:ev_finish' => 'Fine',
	'Class:ApprovedChange/Stimulus:ev_finish+' => '',
	'Class:NormalChange/Attribute:status/Value:new' => 'Nuovo',
	'Class:NormalChange/Attribute:status/Value:new+' => '',
	'Class:NormalChange/Attribute:status/Value:validated' => 'Convalidato',
	'Class:NormalChange/Attribute:status/Value:validated+' => '',
	'Class:NormalChange/Attribute:status/Value:rejected' => 'Rifiutato',
	'Class:NormalChange/Attribute:status/Value:rejected+' => '',
	'Class:NormalChange/Attribute:status/Value:assigned' => 'Assegnato',
	'Class:NormalChange/Attribute:status/Value:assigned+' => '',
	'Class:NormalChange/Attribute:status/Value:plannedscheduled' => 'Pianificato e programmato',
	'Class:NormalChange/Attribute:status/Value:plannedscheduled+' => '',
	'Class:NormalChange/Attribute:status/Value:approved' => 'Approvato',
	'Class:NormalChange/Attribute:status/Value:approved+' => '',
	'Class:NormalChange/Attribute:status/Value:notapproved' => 'Non approvato',
	'Class:NormalChange/Attribute:status/Value:notapproved+' => '',
	'Class:NormalChange/Attribute:status/Value:implemented' => 'Implementato',
	'Class:NormalChange/Attribute:status/Value:implemented+' => '',
	'Class:NormalChange/Attribute:status/Value:monitored' => 'Monitorato',
	'Class:NormalChange/Attribute:status/Value:monitored+' => '',
	'Class:NormalChange/Attribute:status/Value:closed' => 'Chiuso',
	'Class:NormalChange/Attribute:status/Value:closed+' => '',
	'Class:EmergencyChange/Attribute:status/Value:new' => 'Nuovo',
	'Class:EmergencyChange/Attribute:status/Value:new+' => '',
	'Class:EmergencyChange/Attribute:status/Value:validated' => 'Convalidato',
	'Class:EmergencyChange/Attribute:status/Value:validated+' => '',
	'Class:EmergencyChange/Attribute:status/Value:rejected' => 'Rifiutato',
	'Class:EmergencyChange/Attribute:status/Value:rejected+' => '',
	'Class:EmergencyChange/Attribute:status/Value:assigned' => 'Asseganto',
	'Class:EmergencyChange/Attribute:status/Value:assigned+' => '',
	'Class:EmergencyChange/Attribute:status/Value:plannedscheduled' => 'Pianificato e programmato',
	'Class:EmergencyChange/Attribute:status/Value:plannedscheduled+' => '',
	'Class:EmergencyChange/Attribute:status/Value:approved' => 'Approvato',
	'Class:EmergencyChange/Attribute:status/Value:approved+' => '',
	'Class:EmergencyChange/Attribute:status/Value:notapproved' => 'Non approvato',
	'Class:EmergencyChange/Attribute:status/Value:notapproved+' => '',
	'Class:EmergencyChange/Attribute:status/Value:implemented' => 'Implementato',
	'Class:EmergencyChange/Attribute:status/Value:implemented+' => '',
	'Class:EmergencyChange/Attribute:status/Value:monitored' => 'Monitorato',
	'Class:EmergencyChange/Attribute:status/Value:monitored+' => '',
	'Class:EmergencyChange/Attribute:status/Value:closed' => 'Chiuso',
	'Class:EmergencyChange/Attribute:status/Value:closed+' => '',
	'UI-ChangeManagementOverview-ChangeByCategory-last-7-days' => 'Changes by category for the last 7 days~~',
	'UI-ChangeManagementOverview-Last-7-days' => 'Number of changes for the last 7 days~~',
	'UI-ChangeManagementOverview-ChangeByDomain-last-7-days' => 'Changes by domain for the last 7 days~~',
	'UI-ChangeManagementOverview-ChangeByStatus-last-7-days' => 'Changes by status for the last 7 days~~',
	'Class:Change/Attribute:parent_id' => 'Parent change~~',
	'Class:Change/Attribute:parent_name' => 'Parent change Ref~~',
	'Class:Change/Attribute:related_request_list' => 'Related requests~~',
	'Class:Change/Attribute:related_request_list+' => 'All the user requests linked to this change~~',
	'Class:Change/Attribute:related_problems_list' => 'Related problems~~',
	'Class:Change/Attribute:related_problems_list+' => 'All the problems linked to this change~~',
	'Class:Change/Attribute:related_incident_list' => 'Related incidents~~',
	'Class:Change/Attribute:related_incident_list+' => 'All the incidents linked to this change~~',
	'Class:Change/Attribute:child_changes_list' => 'Child changes~~',
	'Class:Change/Attribute:child_changes_list+' => 'All the sub changes linked to this change~~',
	'Class:Change/Attribute:parent_id_friendlyname' => 'Parent friendly name~~',
	'Class:Change/Attribute:parent_id_finalclass_recall' => 'Change type~~',
	'Tickets:Related:OpenChanges' => 'Open changes~~',
	'Tickets:Related:RecentChanges' => 'Recent changes (72h)~~',
));
?>
