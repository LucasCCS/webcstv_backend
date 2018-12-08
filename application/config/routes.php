<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// painel - index
$route['painel'] = 'painel/index';
// painel - downloads
$route['painel/downloads'] = 'painel/downloads';
$route['painel/download/novo'] = 'painel/novo_download';
$route['painel/download/editar/(:any)'] = 'painel/editar_download/$1';
$route['painel/download/apagar/(:any)'] = 'painel/deletar_download/$1';
// painel - galeria / imagens
$route['painel/galeria/imagens'] = 'painel/galeria_imagens';
$route['painel/galeria/videos'] = 'painel/galeria_videos';
$route['painel/galeria/imagem/nova'] = 'painel/nova_galeria_imagem';
$route['painel/galeria/video/novo'] = 'painel/novo_galeria_video';
$route['painel/galeria/apagar/(:any)'] = 'painel/deletar_galeria/$1';
$route['painel/galeria/imagem/editar/(:any)'] = 'painel/editar_galeria_imagem/$1';
$route['painel/galeria/video/editar/(:any)'] = 'painel/editar_galeria_video/$1';
// painel - banners
$route['painel/banners'] = 'painel/banners';
$route['painel/banner/novo'] = 'painel/novo_banner';
$route['painel/banner/editar/(:any)'] = 'painel/editar_banner/$1';
$route['painel/banner/apagar/(:any)'] = 'painel/deletar_banner/$1';
// painel - clientes
$route['painel/clientes'] = 'painel/clientes';
$route['painel/cliente/novo'] = 'painel/novo_cliente';
$route['painel/cliente/editar/(:any)'] = 'painel/editar_cliente/$1';
$route['painel/cliente/apagar/(:any)'] = 'painel/apagar_cliente/$1';
$route['atualizar/posicao/clientes']['POST'] = 'painel/produtos_atualizar_posicao';
// painel - planos
$route['painel/planos'] = 'painel/planos';
$route['painel/plano/novo'] = 'painel/novo_plano';
$route['painel/plano/editar/(:any)'] = 'painel/editar_plano/$1';
$route['painel/plano/apagar/(:any)'] = 'painel/apagar_plano/$1';
$route['painel/sub/plano/apagar/(:any)'] = 'painel/apagar_sub_plano/$1';
// painel - operadoras
$route['painel/operadoras'] = 'painel/operadoras';
$route['painel/operadora/nova'] = 'painel/nova_operadora';
$route['painel/operadora/editar/(:any)'] = 'painel/editar_operadora/$1';
$route['painel/operadora/apagar/(:any)'] = 'painel/apagar_operadora/$1';
// painel - faq
$route['painel/faqs'] = 'painel/faqs';
$route['painel/faq/novo'] = 'painel/novo_faq';
$route['painel/faq/editar/(:any)'] = 'painel/editar_faq/$1';
$route['painel/faq/apagar/(:any)'] = 'painel/apagar_faq/$1';
// painel - usuarios
$route['painel/usuarios'] = 'painel/usuarios';
$route['painel/usuario/novo'] = 'painel/novo_usuario';
$route['painel/usuario/editar/(:any)'] = 'painel/editar_usuario/$1';
$route['painel/usuario/apagar/(:any)'] = 'painel/apagar_usuario/$1';
// painel - historicos pagamentos
$route['painel/historico/pagamentos'] = 'painel/historicos_pagamentos';
$route['painel/historico/pagamentos/novo'] = 'painel/novo_historico_pagamento';
$route['painel/historico/pagamentos/apagar/(:any)'] = 'painel/apagar_historico_pagamento/$1';

// painel - guias de instalação
$route['painel/guias'] = 'painel/guias';
$route['painel/guia/novo'] = 'painel/novo_guia';
$route['painel/guia/editar/(:any)'] = 'painel/editar_guia/$1';
$route['painel/guia/apagar/(:any)'] = 'painel/apagar_guia/$1';

// painel - paginas
$route['painel/paginas'] = 'painel/paginas';
$route['painel/pagina/nova'] = 'painel/nova_pagina';
$route['painel/pagina/editar/(:any)'] = 'painel/editar_pagina/$1';
$route['painel/pagina/apagar/(:any)'] = 'painel/deletar_pagina/$1';
$route['atualizar/posicao/paginas']['POST'] = 'painel/paginas_atualizar_posicao';
// painel - representantes
$route['painel/representantes'] = 'painel/representantes';
$route['painel/representante/novo'] = 'painel/novo_representante';
$route['painel/representante/editar/(:any)'] = 'painel/editar_representante/$1';
$route['painel/representante/apagar/(:any)'] = 'painel/deletar_representante/$1';
$route['atualizar/posicao/representantes']['POST'] = 'painel/representantes_atualizar_posicao';
// painel - configuracoes
$route['painel/configuracoes'] = 'painel/configuracoes';
// funcoes
$route['painel/buscar/(:any)'] = 'painel/buscar_ajax/$1';
// site
$route['default_controller'] = 'site';
$route['(:any)'] = 'site/index/$1';
// $route['(:any)/(:any)'] = 'site/index/$1/$2';
$route['produtos'] = 'site/produtos';
$route['buscar/produtos'] = 'site/search_ajax';
$route['simulador/simular'] = 'site/simulador_ajax';
$route['contato/enviar'] = 'site/send_contact_ajax';
$route['produtos/(:any)'] = 'site/produtos/$1';
$route['produtos/(:any)/(:any)'] = 'site/produtos/$1/$1';
$route['cadastro/finalizar'] = 'site/post_cadastro';
// conta
$route['conta/principal'] = 'site/conta';
$route['conta/recuperar'] = 'site/recovery';
$route['conta/alterar/senha/(:any)'] = 'site/change_password/$1';
$route['conta/alterar/senha'] = 'site/conta_alterar_senha';
$route['conta/alterar/email'] = 'site/conta_alterar_email';
$route['conta/alterar/operadora'] = 'site/conta_alterar_operadora';
$route['conta/dados/assinatura'] = 'site/conta_dados_assinatura';
$route['conta/novo/pagamento'] = 'site/conta_novo_pagamento';
$route['conta/pagamentos/historico'] = 'site/conta_historico_pagamento';
$route['conta/enviar/comprovante/pagamento']['POST'] = 'site/conta_historico_pagamento';
$route['conta/guias/instalacao'] = 'site/conta_guia_instalacao';
$route['conta/gerar/teste/net/(:any)'] = 'site/conta_teste_net/$1';
$route['conta/ativacao'] = 'site/cadastro_ativacao';
$route['conta/autenticar'] = 'site/login';
$route['conta/sair'] = 'site/logout';

// default
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


