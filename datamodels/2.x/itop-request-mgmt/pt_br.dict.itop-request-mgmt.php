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
 * Localized data
 *
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:RequestManagement' => 'Gerenciamento Solicitações',
	'Menu:RequestManagement+' => 'Gerenciamento Solicitações',
	'Menu:RequestManagementProvider' => 'Solicitações provedoras',
	'Menu:RequestManagementProvider+' => 'Solicitações provedoras',
	'Menu:UserRequest:Provider' => 'Solicitações abertas transferidas para provedor',
	'Menu:UserRequest:Provider+' => 'Solicitações abertas transferidas para provedor',
	'Menu:UserRequest:Overview' => 'Visão geral',
	'Menu:UserRequest:Overview+' => 'Visão geral',
	'Menu:NewUserRequest' => 'Nova solicitação',
	'Menu:NewUserRequest+' => 'Criar uma nova solicitação',
	'Menu:SearchUserRequests' => 'Pesquisar por solicitação',
	'Menu:SearchUserRequests+' => 'Pesquisar por solicitação',
	'Menu:UserRequest:Shortcuts' => 'Atalho',
	'Menu:UserRequest:Shortcuts+' => '',
	'Menu:UserRequest:MyRequests' => 'Solicitações abertas por mim',
	'Menu:UserRequest:MyRequests+' => 'Solicitações abertas por mim (como agente)',
	'Menu:UserRequest:MySupportRequests' => "Minhas solicitações de suporte",
	'Menu:UserRequest:MySupportRequests+' => "Minhas solicitações de suporte",
	'Menu:UserRequest:EscalatedRequests' => 'Hot requests',
	'Menu:UserRequest:EscalatedRequests+' => 'Hot requests',
	'Menu:UserRequest:OpenRequests' => 'Todas solicitações abertas',
	'Menu:UserRequest:OpenRequests+' => 'Todas solicitações abertas',
	'UI:WelcomeMenu:MyAssignedCalls' => 'Solicitações atribuidas a mim',
	'UI-RequestManagementOverview-RequestByType-last-14-days' => 'Solicitações dos últimos 14 dias (por tipo)',
	'UI-RequestManagementOverview-Last-14-days' => 'Solicitações dos últimos 14 dias (por dia)',
	'UI-RequestManagementOverview-OpenRequestByStatus' => 'Solicitações abertas por status',
	'UI-RequestManagementOverview-OpenRequestByAgent' => 'Solicitações abertas por agente',
	'UI-RequestManagementOverview-OpenRequestByType' => 'Solicitações abertas por tipo',
	'UI-RequestManagementOverview-OpenRequestByCustomer' => 'Solicitações abertas por organização',
	'Class:UserRequest:KnownErrorList' => 'Erros conhecidos',
	'Menu:UserRequest:MyWorkOrders' => 'Ordens de serviço atribuídas a mim',
	'Menu:UserRequest:MyWorkOrders+' => 'Todas as Ordens de serviço atribuídos a min',
	'Class:Problem:KnownProblemList' => 'Problemas conhecidos',
));

// Dictionnay conventions
// Class:<class_name>
// Class:<class_name>+
// Class:<class_name>/Attribute:<attribute_code>
// Class:<class_name>/Attribute:<attribute_code>+
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>+
// Class:<class_name>/Stimulus:<stimulus_code>
// Class:<class_name>/Stimulus:<stimulus_code>+

//
// Class: UserRequest
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:UserRequest' => 'Usuário solicitante',
	'Class:UserRequest+' => '',
	'Class:UserRequest/Attribute:status' => 'Estado',
	'Class:UserRequest/Attribute:status+' => '',
	'Class:UserRequest/Attribute:status/Value:new' => 'Nova',
	'Class:UserRequest/Attribute:status/Value:new+' => '',
	'Class:UserRequest/Attribute:status/Value:escalated_tto' => 'TTO escalado',
	'Class:UserRequest/Attribute:status/Value:escalated_tto+' => '',
	'Class:UserRequest/Attribute:status/Value:assigned' => 'Atribuido',
	'Class:UserRequest/Attribute:status/Value:assigned+' => '',
	'Class:UserRequest/Attribute:status/Value:escalated_ttr' => 'TTR escalado',
	'Class:UserRequest/Attribute:status/Value:escalated_ttr+' => '',
	'Class:UserRequest/Attribute:status/Value:waiting_for_approval' => 'Aguardando aprovação',
	'Class:UserRequest/Attribute:status/Value:waiting_for_approval+' => '',
	'Class:UserRequest/Attribute:status/Value:approved' => 'Aprovado',
	'Class:UserRequest/Attribute:status/Value:approved+' => '',
	'Class:UserRequest/Attribute:status/Value:rejected' => 'Rejeitado',
	'Class:UserRequest/Attribute:status/Value:rejected+' => '',
	'Class:UserRequest/Attribute:status/Value:pending' => 'Pendente',
	'Class:UserRequest/Attribute:status/Value:pending+' => '',
	'Class:UserRequest/Attribute:status/Value:resolved' => 'Resolvido',
	'Class:UserRequest/Attribute:status/Value:resolved+' => '',
	'Class:UserRequest/Attribute:status/Value:closed' => 'Fechado',
	'Class:UserRequest/Attribute:status/Value:closed+' => '',
	'Class:UserRequest/Attribute:request_type' => 'Tipo solicitação',
	'Class:UserRequest/Attribute:request_type+' => '',
	'Class:UserRequest/Attribute:request_type/Value:incident' => 'Incidente',
	'Class:UserRequest/Attribute:request_type/Value:incident+' => 'Incidente',
	'Class:UserRequest/Attribute:request_type/Value:service_request' => 'Solicitação serviço',
	'Class:UserRequest/Attribute:request_type/Value:service_request+' => 'Solicitação serviço',
	'Class:UserRequest/Attribute:impact' => 'Impacto',
	'Class:UserRequest/Attribute:impact+' => '',
	'Class:UserRequest/Attribute:impact/Value:1' => 'Um departamento',
	'Class:UserRequest/Attribute:impact/Value:1+' => '',
	'Class:UserRequest/Attribute:impact/Value:2' => 'Um serviço',
	'Class:UserRequest/Attribute:impact/Value:2+' => '',
	'Class:UserRequest/Attribute:impact/Value:3' => 'Uma pessoa',
	'Class:UserRequest/Attribute:impact/Value:3+' => '',
	'Class:UserRequest/Attribute:priority' => 'Prioridade',
	'Class:UserRequest/Attribute:priority+' => '',
	'Class:UserRequest/Attribute:priority/Value:1' => 'Crítica',
	'Class:UserRequest/Attribute:priority/Value:1+' => 'Crítica',
	'Class:UserRequest/Attribute:priority/Value:2' => 'Alta',
	'Class:UserRequest/Attribute:priority/Value:2+' => 'Alta',
	'Class:UserRequest/Attribute:priority/Value:3' => 'Média',
	'Class:UserRequest/Attribute:priority/Value:3+' => 'Média',
	'Class:UserRequest/Attribute:priority/Value:4' => 'Baixa',
	'Class:UserRequest/Attribute:priority/Value:4+' => 'Baixa',
	'Class:UserRequest/Attribute:urgency' => 'Urgência',
	'Class:UserRequest/Attribute:urgency+' => '',
	'Class:UserRequest/Attribute:urgency/Value:1' => 'Crítica',
	'Class:UserRequest/Attribute:urgency/Value:1+' => 'Crítica',
	'Class:UserRequest/Attribute:urgency/Value:2' => 'Alta',
	'Class:UserRequest/Attribute:urgency/Value:2+' => 'Alta',
	'Class:UserRequest/Attribute:urgency/Value:3' => 'Média',
	'Class:UserRequest/Attribute:urgency/Value:3+' => 'Média',
	'Class:UserRequest/Attribute:urgency/Value:4' => 'Baixa',
	'Class:UserRequest/Attribute:urgency/Value:4+' => 'Baixa',
	'Class:UserRequest/Attribute:origin' => 'Origem',
	'Class:UserRequest/Attribute:origin+' => '',
	'Class:UserRequest/Attribute:origin/Value:mail' => 'Email',
	'Class:UserRequest/Attribute:origin/Value:mail+' => 'Email',
	'Class:UserRequest/Attribute:origin/Value:monitoring' => 'Monitoramento',
	'Class:UserRequest/Attribute:origin/Value:monitoring+' => 'Monitoramento',
	'Class:UserRequest/Attribute:origin/Value:phone' => 'Telefone',
	'Class:UserRequest/Attribute:origin/Value:phone+' => 'Telefone',
	'Class:UserRequest/Attribute:origin/Value:portal' => 'Portal',
	'Class:UserRequest/Attribute:origin/Value:portal+' => 'Portal',
	'Class:UserRequest/Attribute:approver_id' => 'Aprovador',
	'Class:UserRequest/Attribute:approver_id+' => '',
	'Class:UserRequest/Attribute:approver_email' => 'Email aprovador',
	'Class:UserRequest/Attribute:approver_email+' => '',
	'Class:UserRequest/Attribute:service_id' => 'Serviço',
	'Class:UserRequest/Attribute:service_id+' => '',
	'Class:UserRequest/Attribute:service_name' => 'Nome serviço',
	'Class:UserRequest/Attribute:service_name+' => '',
	'Class:UserRequest/Attribute:servicesubcategory_id' => 'Sub-categoria serviço',
	'Class:UserRequest/Attribute:servicesubcategory_id+' => '',
	'Class:UserRequest/Attribute:servicesubcategory_name' => 'Nome Sub-categoria serviço',
	'Class:UserRequest/Attribute:servicesubcategory_name+' => '',
	'Class:UserRequest/Attribute:escalation_flag' => 'Alerta vermelho',
	'Class:UserRequest/Attribute:escalation_flag+' => '',
	'Class:UserRequest/Attribute:escalation_flag/Value:no' => 'Não',
	'Class:UserRequest/Attribute:escalation_flag/Value:no+' => 'Não',
	'Class:UserRequest/Attribute:escalation_flag/Value:yes' => 'Sim',
	'Class:UserRequest/Attribute:escalation_flag/Value:yes+' => 'Sim',
	'Class:UserRequest/Attribute:escalation_reason' => 'Razão alerta',
	'Class:UserRequest/Attribute:escalation_reason+' => '',
	'Class:UserRequest/Attribute:assignment_date' => 'Data atribuição',
	'Class:UserRequest/Attribute:assignment_date+' => '',
	'Class:UserRequest/Attribute:resolution_date' => 'Data resolução',
	'Class:UserRequest/Attribute:resolution_date+' => '',
	'Class:UserRequest/Attribute:last_pending_date' => 'Última data pendente',
	'Class:UserRequest/Attribute:last_pending_date+' => '',
	'Class:UserRequest/Attribute:cumulatedpending' => 'Pendências acumuladas',
	'Class:UserRequest/Attribute:cumulatedpending+' => '',
	'Class:UserRequest/Attribute:tto' => 'TTO',
	'Class:UserRequest/Attribute:tto+' => '',
	'Class:UserRequest/Attribute:ttr' => 'TTR',
	'Class:UserRequest/Attribute:ttr+' => '',
	'Class:UserRequest/Attribute:tto_escalation_deadline' => 'Prazo determinado TTO',
	'Class:UserRequest/Attribute:tto_escalation_deadline+' => '',
	'Class:UserRequest/Attribute:sla_tto_passed' => 'SLA TTO passou',
	'Class:UserRequest/Attribute:sla_tto_passed+' => '',
	'Class:UserRequest/Attribute:sla_tto_over' => 'SLA TTO acima',
	'Class:UserRequest/Attribute:sla_tto_over+' => '',
	'Class:UserRequest/Attribute:ttr_escalation_deadline' => 'Prazo determinado TTR',
	'Class:UserRequest/Attribute:ttr_escalation_deadline+' => '',
	'Class:UserRequest/Attribute:sla_ttr_passed' => 'SLA TTR passou',
	'Class:UserRequest/Attribute:sla_ttr_passed+' => '',
	'Class:UserRequest/Attribute:sla_ttr_over' => 'SLA TTR acima',
	'Class:UserRequest/Attribute:sla_ttr_over+' => '',
	'Class:UserRequest/Attribute:time_spent' => 'Atraso resolução',
	'Class:UserRequest/Attribute:time_spent+' => '',
	'Class:UserRequest/Attribute:resolution_code' => 'Código resolução',
	'Class:UserRequest/Attribute:resolution_code+' => '',
	'Class:UserRequest/Attribute:resolution_code/Value:assistance' => 'Assistência',
	'Class:UserRequest/Attribute:resolution_code/Value:assistance+' => 'Assistência',
	'Class:UserRequest/Attribute:resolution_code/Value:bug fixed' => 'Bug corrigido',
	'Class:UserRequest/Attribute:resolution_code/Value:bug fixed+' => 'Bug corrigido',
	'Class:UserRequest/Attribute:resolution_code/Value:hardware repair' => 'Hardware reparado',
	'Class:UserRequest/Attribute:resolution_code/Value:hardware repair+' => 'Hardware reparado',
	'Class:UserRequest/Attribute:resolution_code/Value:other' => 'Outros',
	'Class:UserRequest/Attribute:resolution_code/Value:other+' => 'Outros',
	'Class:UserRequest/Attribute:resolution_code/Value:software patch' => 'Software patch',
	'Class:UserRequest/Attribute:resolution_code/Value:software patch+' => 'Software patch',
	'Class:UserRequest/Attribute:resolution_code/Value:system update' => 'Atualização sistema',
	'Class:UserRequest/Attribute:resolution_code/Value:system update+' => 'Atualização sistema',
	'Class:UserRequest/Attribute:resolution_code/Value:training' => 'Treinamento',
	'Class:UserRequest/Attribute:resolution_code/Value:training+' => 'Treinamento',
	'Class:UserRequest/Attribute:solution' => 'Solução',
	'Class:UserRequest/Attribute:solution+' => '',
	'Class:UserRequest/Attribute:pending_reason' => 'Razão pendência',
	'Class:UserRequest/Attribute:pending_reason+' => '',
	'Class:UserRequest/Attribute:parent_request_id' => 'Solicitação principal',
	'Class:UserRequest/Attribute:parent_request_id+' => '',
	'Class:UserRequest/Attribute:parent_request_ref' => 'Ref solicitação',
	'Class:UserRequest/Attribute:parent_request_ref+' => '',
	'Class:UserRequest/Attribute:parent_problem_id' => 'Problema principal',
	'Class:UserRequest/Attribute:parent_problem_id+' => '',
	'Class:UserRequest/Attribute:parent_problem_ref' => 'Ref problema',
	'Class:UserRequest/Attribute:parent_problem_ref+' => '',
	'Class:UserRequest/Attribute:parent_change_id' => 'Mudança principal',
	'Class:UserRequest/Attribute:parent_change_id+' => '',
	'Class:UserRequest/Attribute:parent_change_ref' => 'Ref mudança',
	'Class:UserRequest/Attribute:parent_change_ref+' => '',
	'Class:UserRequest/Attribute:related_request_list' => 'Sub-solicitação',
	'Class:UserRequest/Attribute:related_request_list+' => 'Todas as solicitações vinculadas a essa solicitação principal',
	'Class:UserRequest/Attribute:public_log' => 'Log público',
	'Class:UserRequest/Attribute:public_log+' => '',
	'Class:UserRequest/Attribute:user_satisfaction' => 'Satisfação do usuário',
	'Class:UserRequest/Attribute:user_satisfaction+' => '',
	'Class:UserRequest/Attribute:user_satisfaction/Value:1' => 'Muito satisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:1+' => 'Muito satisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:2' => 'Bastante satisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:2+' => 'Bastante satisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:3' => 'Bastante insatisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:3+' => 'Bastante insatisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:4' => 'Muito insatisfeito',
	'Class:UserRequest/Attribute:user_satisfaction/Value:4+' => 'Muito insatisfeito',
	'Class:UserRequest/Attribute:user_comment' => 'Comentário usuário',
	'Class:UserRequest/Attribute:user_comment+' => '',
	'Class:UserRequest/Attribute:parent_request_id_friendlyname' => 'parent_request_id_friendlyname',
	'Class:UserRequest/Attribute:parent_request_id_friendlyname+' => '',
	'Class:UserRequest/Stimulus:ev_assign' => 'Atribuir',
	'Class:UserRequest/Stimulus:ev_assign+' => '',
	'Class:UserRequest/Stimulus:ev_reassign' => 'Re-Atribuir',
	'Class:UserRequest/Stimulus:ev_reassign+' => '',
	'Class:UserRequest/Stimulus:ev_approve' => 'Aprovar',
	'Class:UserRequest/Stimulus:ev_approve+' => '',
	'Class:UserRequest/Stimulus:ev_reject' => 'Rejeitar',
	'Class:UserRequest/Stimulus:ev_reject+' => '',
	'Class:UserRequest/Stimulus:ev_pending' => 'Pendência',
	'Class:UserRequest/Stimulus:ev_pending+' => '',
	'Class:UserRequest/Stimulus:ev_timeout' => 'Timeout',
	'Class:UserRequest/Stimulus:ev_timeout+' => '',
	'Class:UserRequest/Stimulus:ev_autoresolve' => 'Resolvido automaticamente',
	'Class:UserRequest/Stimulus:ev_autoresolve+' => '',
	'Class:UserRequest/Stimulus:ev_autoclose' => 'Fechado automaticamente',
	'Class:UserRequest/Stimulus:ev_autoclose+' => '',
	'Class:UserRequest/Stimulus:ev_resolve' => 'Marcar como resolvido',
	'Class:UserRequest/Stimulus:ev_resolve+' => '',
	'Class:UserRequest/Stimulus:ev_close' => 'Fechar esta solicitação',
	'Class:UserRequest/Stimulus:ev_close+' => '',
	'Class:UserRequest/Stimulus:ev_reopen' => 'Re-abrir',
	'Class:UserRequest/Stimulus:ev_reopen+' => '',
	'Class:UserRequest/Stimulus:ev_wait_for_approval' => 'Aguardar por aprovação',
	'Class:UserRequest/Stimulus:ev_wait_for_approval+' => '',
	'Class:UserRequest/Error:CannotAssignParentRequestIdToSelf' => 'Não é possível atribuir a solicitação principal para si mesmo',
));


Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Portal:TitleDetailsFor_Request' => 'Detalhes da solicitação',
	'Portal:ButtonUpdate' => 'Atualizado',
	'Portal:ButtonClose' => 'Fechado',
	'Portal:ButtonReopen' => 'Re-aberto',
	'Portal:ShowServices' => 'Catálogo dos serviços',
	'Portal:SelectRequestType' => 'Selecione um tipo de solicitação',
	'Portal:SelectServiceElementFrom_Service' => 'Selecione um serviço para %1$s',
	'Portal:SelectRequestTemplate' => 'Selecione um modelo para %1$s',
	'Portal:ListServices' => 'Lista dos serviços',
	'Portal:TitleDetailsFor_Service' => 'Detalhes dos serviços',
	'Portal:Button:CreateRequestFromService' => 'Criar uma solicitação para esse serviço',
	'Portal:ListOpenRequests' => 'Lista solicitações abertas',
'Portal:UserRequest:MoreInfo' => 'Mais informações',
	'Portal:Details-Service-Element' => 'Elementos do Serviço',
	'Portal:NoClosedTicket' => 'Nenhuma solicitação fechada',
	'Portal:NoService' => '',
	'Portal:ListOpenProblems' => 'Problemas em curso',
	'Portal:ShowProblem' => 'Problemas',
	'Portal:ShowFaqs' => 'FAQs',
	'Portal:NoOpenProblem' => 'Nenhum problema aberto',
	'Portal:SelectLanguage' => "Alterar sua linguagem",
	'Portal:LanguageChangedTo_Lang' => 'Linguagem alterada para',
	'Portal:ChooseYourFavoriteLanguage' => 'Escolha sua linguagem favorita',
	'Tickets:Related:OpenIncidents' => 'Open incidents~~',
	'Class:UserRequest/Method:ResolveChildTickets' => 'ResolveChildTickets~~',
	'Class:UserRequest/Method:ResolveChildTickets+' => 'Cascade the resolution to child requests (ev_autoresolve), and align the following characteristics of the request: service, team, agent, resolution info~~',
));

?>
