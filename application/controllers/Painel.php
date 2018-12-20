<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public $site;
	public $site_categorias;
	public $userPanel;
	public function __construct() 
	{
		// phpinfo();
		parent::__construct();
		$this->load->model('site_model','configuracores');
		$this->load->model('paginas_model','paginas');
		$this->load->model('clientes_model','clientes');
		$this->load->model('metodospagamento_model','metodos_pagamento');
		$this->load->model('historicopagamentos_model','historico_pagamentos');
		$this->load->model('planos_model','planos');
		$this->load->model('guiasinstalacao_model','guias');
		$this->load->model('subplanos_model','sub_planos');
		$this->load->model('usuarios_model','usuarios');
		$this->load->model('faq_model','faqs');

		$this->load->model('operadoras_model','operadoras');
		$this->load->model('servidorusers_model','servidor_users');

		$this->load->helper('url');
		$this->load->library('form_validation');
		// Custom Libraries
		$this->load->library('auth');
		$this->load->library('clientestatus');
		/**
		 * getSiteConfig
		 */
		$this->site = $this->configuracores->getSiteConfig();
		/**
		 * checkAuth
		 */
		$this->auth->checkAuth();
		/**
		 * userPanel
		 */
		$this->userPanel = $this->auth->getUserPanelLogged();
	}
	/**----------------------------------------------------------------------------
	 *  								INDEX
	 *-----------------------------------------------------------------------------*/
	public function index()
	{
		$this->load->view('painel/index',[
			'titulo' => 'Principal'

		]);
	}
	/**----------------------------------------------------------------------------
	 *  								LOGIN
	 *-----------------------------------------------------------------------------*/
	public function login()
	{
		$error_message = [];
		if (isset($_POST['login'])) {
			$this->form_validation->set_rules('usuario','Usuario','required');
			$this->form_validation->set_rules('senha','Senha','required');
			if ($this->form_validation->run() == TRUE) {
				$data = $this->input->post();
				$login = $this->auth->login($data);

				if($login != false) {
					redirect('painel');
				} else {
					$error_message[] = "Verifique os dados informados e tente novamente!";
				}
			}
		}
		$this->load->view('painel/login',['error_message' => $error_message]);
	}
	/**----------------------------------------------------------------------------
	 *  								CLIENTES
	 *-----------------------------------------------------------------------------*/
	/**
	 * clientes
	 */
	public function clientes()
	{
		$clientes = $this->clientes->getClientes();
		$this->load->view('painel/clientes/lista',[
			'clientes' => $clientes,

		]);
	}
	/**
	 * novo_cliente
	 */
	public function novo_cliente()
	{

		$planos = $this->planos->getPlanos();
		$metodos_pagamento = $this->metodos_pagamento->getMetodosPagamento();

		if (isset($_POST['novo_cliente'])) {
			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('telefone','Telefone','required|is_unique[cms_clientes.telefone]');
			$this->form_validation->set_rules('email','E-mail','required|is_unique[cms_clientes.email]|valid_email');
			$this->form_validation->set_rules('id_plano','Plano','required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('id_metodo_pagamento','Método de Pagamento','required');
			$this->form_validation->set_rules('senha','Senha','required|min_length[8]');
			
			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				unset($data['novo_cliente']);
				$id_cliente = $this->clientes->insertClientes($data);	
				$this->session->set_flashdata('success','Cliente adicionado com sucesso.');
				redirect('painel/cliente/editar/'.$id_cliente);				
			}	
		}
		$this->load->view('painel/clientes/novo_cliente',[
			'planos' => $planos,
			'metodos_pagamento' => $metodos_pagamento
		]);
	}
	/**
	 * editar_cliente
	 */
	public function editar_cliente()
	{
		$id_cliente = $this->uri->segment(4);
		if($id_cliente != 0) {
			$cliente = $this->clientes->getClientes(['id_cliente' => $id_cliente]);
			$planos = $this->planos->getPlanos();
			$metodos_pagamento = $this->metodos_pagamento->getMetodosPagamento();

			if (isset($_POST['editar_cliente'])) {
				$this->form_validation->set_rules('nome','Nome','required');
				if($cliente['telefone'] != $_POST['telefone']) $this->form_validation->set_rules('telefone','Telefone','required|is_unique[cms_clientes.telefone]');
				if($cliente['email'] != $_POST['email']) $this->form_validation->set_rules('email','E-mail','required|is_unique[cms_clientes.email]|valid_email');
				$this->form_validation->set_rules('id_plano','Plano','required');
				$this->form_validation->set_rules('status','Status','required');
				$this->form_validation->set_rules('id_metodo_pagamento','Método de Pagamento','required');
				if(!empty($_POST['senha'])) $this->form_validation->set_rules('senha','Senha','required|min_length[8]');
				if($this->form_validation->run() == TRUE) {			
					$data = $this->input->post();
					$data['id_cliente'] = $id_cliente;
					unset($data['editar_cliente']);
					// senha
					if (strlen($data['senha']) == 0) {
						unset($data['senha']);
					} else {
						$data['senha'] = password_hash($data['senha'],PASSWORD_DEFAULT);
					}
					// email
					if($cliente['email'] == $_POST['email']) unset($data['email']);
					// telefone
					if($cliente['telefone'] == $_POST['telefone']) unset($data['telefone']);
					$this->clientes->updateClientes($data);	
					$this->session->set_flashdata('success','Cliente salvo com sucesso.');
					redirect('painel/cliente/editar/'.$id_cliente);				
				}
			}

			$this->load->view('painel/clientes/editar_cliente',[
				'cliente' => $cliente,
				'planos' => $planos,
				'metodos_pagamento' => $metodos_pagamento
			]);
		} else {
			redirect('painel/clientes');
		}

	}
	/**
	 * apagar_cliente
	 */
	public function apagar_cliente() 
	{
		
		$id_cliente = $this->uri->segment(4);
		if($id_cliente != 0) {
			$cliente = $this->clientes->getClientes(['id_cliente' => $id_cliente]);
			if (isset($_POST['apagar_cliente'])) {
				$this->clientes->deleteClientes(['id_cliente' => $cliente['id_cliente']]);
				redirect('painel/clientes');
			}
			$this->load->view('painel/clientes/apagar_cliente',[]);
		} else {
			redirect('painel/clientes');
		}
	}
	/**----------------------------------------------------------------------------
	 *  								PLANOS
	 *-----------------------------------------------------------------------------*/
	/**
	 * planos
	 */
	public function planos()
	{
		$planos = $this->planos->getPlanos();
		$sub_planos = $this->sub_planos->getSubPlanos();
		if (isset($_POST['adicionar_sub_plano'])) {
			$this->sub_planos->insertSubPlanos([
				'valor' => $_POST['valor'],
				'dias' => $_POST['dias'],
				'periodicidade' => $_POST['periodicidade'],
				'pagseguro_codigo' => $_POST['pagseguro_codigo'],
				'mercadopago_codigo' => $_POST['mercadopago_codigo'],
				'id_plano' => $_POST['id_plano'],
			]);
			$this->session->set_flashdata('sub_plano_adicionado','Sub-plano adicionado com sucesso!');
			redirect('painel/planos');
		}
		$this->load->view('painel/planos/lista',[
			'planos' => $planos,
			'sub_planos' => $sub_planos,
			'titulo' => 'Gerenciamento de Planos'
		]);
	}
	/**
	 * novo_plano
	 */
	public function novo_plano()
	{

		if (isset($_POST['novo_plano'])) {
			$this->form_validation->set_rules('titulo','Título','required');
			$this->form_validation->set_rules('valor','Valor','required');
			$this->form_validation->set_rules('valor_antigo','Valor Antigo','required');
			$this->form_validation->set_rules('url_teste','Url Gerador de Teste','required');
			$this->form_validation->set_rules('descricao','Descrição','required');
			$this->form_validation->set_rules('dias','Duração','required');
			$this->form_validation->set_rules('plano_tipo','Tipo do Plano','required');
			$this->form_validation->set_rules('pagseguro_codigo','Código PagSeguro','required');
			$this->form_validation->set_rules('mercadopago_codigo','Código MercadoPago','required');
			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				unset($data['novo_plano']);
				$id_plano = $this->planos->insertPlanos($data);	
				$this->session->set_flashdata('success','Plano adicionado com sucesso.');
				redirect('painel/plano/editar/'.$id_plano);				
			}	
		}
		$this->load->view('painel/planos/novo_plano',[
			'titulo' => 'Novo Plano'
		]);
	}
	/**
	 * editar_plano
	 */
	public function editar_plano()
	{
		$id_plano = $this->uri->segment(4);
		if($id_plano != 0) {
			$plano = $this->planos->getPlanos(['id_plano' => $id_plano]);

			if (isset($_POST['editar_plano'])) {
				$this->form_validation->set_rules('titulo','Título','required');
				$this->form_validation->set_rules('valor','Valor','required');
				$this->form_validation->set_rules('valor_antigo','Valor Antigo','required');
				$this->form_validation->set_rules('url_teste','Url Gerador de Teste','required');
				$this->form_validation->set_rules('plano_tipo','Tipo do Plano','required');
				$this->form_validation->set_rules('descricao','Descrição','required');
				$this->form_validation->set_rules('dias','Duração','required');
				$this->form_validation->set_rules('pagseguro_codigo','Código PagSeguro','required');
				$this->form_validation->set_rules('mercadopago_codigo','Código MercadoPago','required');
				if($this->form_validation->run() == TRUE) {			
					$data = $this->input->post();
					$data['id_plano'] = $id_plano;
					unset($data['editar_plano']);
					$this->planos->updatePlanos($data);	
					$this->session->set_flashdata('success','Plano salvo com sucesso.');
					redirect('painel/plano/editar/'.$id_plano);				
				}
			}

			$this->load->view('painel/planos/editar_plano',[
				'plano' => $plano,
				'titulo' => 'Editar Plano'
			]);
		} else {
			redirect('painel/planos');
		}

	}
	/**
	 * apagar_plano
	 */
	public function apagar_plano() 
	{
		
		$id_plano = $this->uri->segment(4);
		if($id_plano != 0) {
			$plano = $this->planos->getPlanos(['id_plano' => $id_plano]);
			if (isset($_POST['apagar_plano'])) {
				$this->planos->deletePlanos(['id_plano' => $plano['id_plano']]);
				redirect('painel/planos');
			}
			$this->load->view('painel/planos/apagar_plano',[
				'titulo' => 'Apagar Plano'
			]);
		} else {
			redirect('painel/planos');
		}
	}	
	/**
	 * apagar_sub_plano
	 */
	public function apagar_sub_plano() 
	{
		
		$id_sub_plano = $this->uri->segment(5);
		if($id_sub_plano != 0) {
			$sub_plano = $this->sub_planos->getSubPlanos(['id_sub_plano' => $id_sub_plano]);
			if (isset($_POST['apagar_sub_plano'])) {
				$this->sub_planos->deleteSubPlanos(['id_sub_plano' => $sub_plano['id_sub_plano']]);
				redirect('painel/planos');
			}
			$this->load->view('painel/planos/apagar_sub_plano',['titulo' => 'Apagar Plano']);
		} else {
			redirect('painel/planos');
		}
	}
	/**----------------------------------------------------------------------------
	 *  								USUARIOS
	 *-----------------------------------------------------------------------------*/
	/**
	 * usuarios
	 */
	public function usuarios()
	{
		$usuarios = $this->usuarios->getUsuarios();
		$this->load->view('painel/usuarios/lista',[
			'usuarios' => $usuarios,
			'titulo' => 'Gerenciamento de Usuários'
		]);
	}
	/**
	 * novo_usuario
	 */
	public function novo_usuario()
	{

		if (isset($_POST['novo_usuario'])) {
			$this->form_validation->set_rules('usuario','Usuario','required|is_unique[cms_usuarios.usuario]');
			$this->form_validation->set_rules('senha','Senha','required');

			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				$data['senha'] = password_hash($data['senha'],PASSWORD_DEFAULT);
				unset($data['novo_usuario']);
				$id_usuario = $this->usuarios->insertUsuarios($data);	
				$this->session->set_flashdata('success','Usuario adicionado com sucesso.');
				redirect('painel/usuario/editar/'.$id_usuario);				
			}	
		}
		$this->load->view('painel/usuarios/novo_usuario',[
			'titulo' => 'Novo Usuário'
		]);
	}
	/**
	 * editar_usuario
	 */
	public function editar_usuario()
	{
		$id_usuario = $this->uri->segment(4);
		if($id_usuario != 0) {
			$usuario = $this->usuarios->getUsuarios(['id_usuario' => $id_usuario]);

			if (isset($_POST['editar_usuario'])) {
				if($_POST['usuario'] == $usuario['usuario']) $this->form_validation->set_rules('usuario','Usuário','required');
				else $this->form_validation->set_rules('usuario','Usuário','required|is_unique[cms_usuarios.usuario]');
				if(!empty($_POST['senha'])) $this->form_validation->set_rules('senha','Senha','required');
				if($this->form_validation->run() == TRUE) {			
					$data = $this->input->post();
					$data['id_usuario'] = $id_usuario;
					unset($data['editar_usuario']);
					// senha
					if (strlen($data['senha']) == 0) {
						unset($data['senha']);
					} else {
						$data['senha'] = password_hash($data['senha'],PASSWORD_DEFAULT);
					}
					$this->usuarios->updateUsuarios($data);	
					$this->session->set_flashdata('success','Usuário salvo com sucesso.');
					redirect('painel/usuario/editar/'.$id_usuario);				
				}
			}

			$this->load->view('painel/usuarios/editar_usuario',[
				'usuario' => $usuario,
				'titulo' => 'Editar Usuário'
			]);
		} else {
			redirect('painel/usuarios');
		}

	}
	/**
	 * apagar_usuario
	 */
	public function apagar_usuario() 
	{
		
		$id_usuario = $this->uri->segment(4);
		if($id_usuario != 0) {
			$usuario = $this->usuarios->getUsuarios(['id_usuario' => $id_usuario]);
			if (isset($_POST['apagar_usuario'])) {
				$this->usuarios->deleteUsuarios(['id_usuario' => $usuario['id_usuario']]);
				redirect('painel/usuarios');
			}
			$this->load->view('painel/usuarios/apagar_usuario',[
				'titulo' => 'Apagar Usuário'
			]);
		} else {
			redirect('painel/usuarios');
		}
	}
	/**----------------------------------------------------------------------------
	 *  								GUIAS
	 *-----------------------------------------------------------------------------*/
	/**
	 * guias
	 */
	public function guias()
	{
		$guias = $this->guias->getGuiaInstalacao();
		$this->load->view('painel/guias/lista',[
			'guias' => $guias,
			'titulo' => 'Gerenciamento de Guias'
		]);
	}
	/**
	 * novo_guia
	 */
	public function novo_guia()
	{

		if (isset($_POST['novo_guia'])) {
			$this->form_validation->set_rules('titulo','Título','required');
			$this->form_validation->set_rules('imagem_url','Url Thumbnail','required');
			$this->form_validation->set_rules('video_url','Url Guia','required');
			$this->form_validation->set_rules('header_titulo','Header Título','required');
			$this->form_validation->set_rules('descricao','Descrição','required');
			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				unset($data['novo_guia']);
				$id_guia_instalacao = $this->guias->insertGuiaInstalacao($data);	
				$this->session->set_flashdata('success','Guia de Instalação adicionado com sucesso.');
				redirect('painel/guias/editar/'.$id_guia_instalacao);				
			}	
		}
		$this->load->view('painel/guias/novo_guia',[
			'titulo' => 'Novo Guia'
		]);
	}
	/**
	 * editar_guia
	 */
	public function editar_guia()
	{
		$id_guia_instalacao = $this->uri->segment(4);
		if($id_guia_instalacao != 0) {
			$guia = $this->guias->getGuiaInstalacao(['id_guia_instalacao' => $id_guia_instalacao]);

			if (isset($_POST['editar_guia'])) {		
				$this->form_validation->set_rules('titulo','Título','required');
				$this->form_validation->set_rules('imagem_url','Url Thumbnail','required');
				$this->form_validation->set_rules('video_url','Url Guia','required');
				$this->form_validation->set_rules('header_titulo','Header Título','required');
				$this->form_validation->set_rules('descricao','descricao','required');
	
				if($this->form_validation->run() == TRUE) {		
					$this->guias->updateGuiaInstalacao([
						'titulo' => $_POST['titulo'],
						'imagem_url' => $_POST['imagem_url'],
						'header_titulo' => $_POST['header_titulo'],
						'descricao' => $_POST['descricao'],
						'video_url' => $_POST['video_url'],
						'id_guia_instalacao' => $id_guia_instalacao
					]);
					$this->session->set_flashdata('success','Guia de Instalação salvo com sucesso.');
					redirect('painel/guia/editar/'.$id_guia_instalacao);	
				}							
			}

			$this->load->view('painel/guias/editar_guia',[
				'guia' => $guia,
				'titulo' => 'Editar Guia'
			]);
		} else {
			redirect('painel/guias');
		}

	}
	/**
	 * apagar_guia
	 */
	public function apagar_guia() 
	{	
		$id_guia_instalacao = $this->uri->segment(4);
		if($id_guia_instalacao != 0) {
			$guia = $this->guias->getGuiaInstalacao(['id_guia_instalacao' => $id_guia_instalacao]);
			if (isset($_POST['apagar_guia'])) {
				$this->guias->deleteGuiaInstalacao(['id_guia_instalacao' => $guia['id_guia_instalacao']]);
				redirect('painel/guias');
			}
			$this->load->view('painel/guias/apagar_guia',[
				'titulo' => 'Apagar Guia'
			]);
		} else {
			redirect('painel/guias');
		}
	}
	/**----------------------------------------------------------------------------
	 *  								FAQ
	 *-----------------------------------------------------------------------------*/
	/**
	 * faqs
	 */
	public function faqs()
	{
		$faqs = $this->faqs->getFaq();
		$this->load->view('painel/faqs/lista',[
			'faqs' => $faqs,
			'titulo' => 'Gerenciamento de FAQ'
		]);
	}
	/**
	 * novo_guia
	 */
	public function novo_faq()
	{

		if (isset($_POST['novo_faq'])) {
			$this->form_validation->set_rules('titulo','Título','required');
			$this->form_validation->set_rules('descricao','Descrição','required');

			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				unset($data['novo_faq']);
				$id_faq = $this->faqs->insertFaq($data);	
				$this->session->set_flashdata('success','FAQ adicionado com sucesso.');
				redirect('painel/faq/editar/'.$id_faq);				
			}	
		}
		$this->load->view('painel/faqs/novo_faq',[
			'titulo' => 'Novo FAQ'
		]);
	}
	/**
	 * editar_faq
	 */
	public function editar_faq()
	{
		$id_faq = $this->uri->segment(4);
		if($id_faq != 0) {
			$faq = $this->faqs->getFaq(['id_faq' => $id_faq]);

			if (isset($_POST['editar_faq'])) {		
				$this->form_validation->set_rules('titulo','Título','required');
				$this->form_validation->set_rules('descricao','Descrição','required');
	
				if($this->form_validation->run() == TRUE) {		
					$this->faqs->updateFaq([
						'titulo' => $_POST['titulo'],
						'descricao' => $_POST['descricao'],
						'id_faq' => $id_faq
					]);
					$this->session->set_flashdata('success','FAQ salvo com sucesso.');
					redirect('painel/faq/editar/'.$id_faq);	
				}							
			}

			$this->load->view('painel/faqs/editar_faq',[
				'faq' => $faq,
				'titulo' => 'Editar FAQ'
			]);
		} else {
			redirect('painel/faqs');
		}

	}
	/**
	 * apagar_faq
	 */
	public function apagar_faq() 
	{	
		$id_faq = $this->uri->segment(4);
		if($id_faq != 0) {
			$faq = $this->faqs->getFaq(['id_faq' => $id_faq]);
			if (isset($_POST['apagar_faq'])) {
				$this->faqs->deleteFaq(['id_faq' => $faq['id_faq']]);
				redirect('painel/faqs');
			}
			$this->load->view('painel/faqs/apagar_faq',[
				'titulo' => 'Apagar FAQ'
			]);
		} else {
			redirect('painel/faqs');
		}
	}	
	/**----------------------------------------------------------------------------
	 *  								OPERADORA
	 *-----------------------------------------------------------------------------*/
	/**
	 * operadoras
	 */
	public function operadoras()
	{
		$operadoras = $this->operadoras->getOperadoras();
		$this->load->view('painel/operadoras/lista',[
			'operadoras' => $operadoras,
		]);
	}
	/**
	 * nova_operadora
	 */
	public function nova_operadora()
	{

		if (isset($_POST['nova_operadora'])) {
			$this->form_validation->set_rules('titulo','Título','required');
			$this->form_validation->set_rules('imagem_logo','Imagem Logo Url','required');
			$this->form_validation->set_rules('url','Url Servidor','required');
			$this->form_validation->set_rules('porta','Porta Servidor','required');
			$this->form_validation->set_rules('perfil','Perfil Servidor','required');
			if($this->form_validation->run() == TRUE) {			
				$data = $this->input->post();
				unset($data['nova_operadora']);
				$id_operadora = $this->operadoras->insertOperadoras($data);	
				$this->session->set_flashdata('success','Operadora adicionada com sucesso.');
				redirect('painel/operadora/editar/'.$id_operadora);				
			}	
		}
		$this->load->view('painel/operadoras/nova_operadora',[]);
	}
	/**
	 * editar_operadora
	 */
	public function editar_operadora()
	{
		$id_operadora = $this->uri->segment(4);
		if($id_operadora != 0) {
			$operadora = $this->operadoras->getOperadoras(['id_operadora' => $id_operadora]);

			if (isset($_POST['editar_operadora'])) {		
				$this->form_validation->set_rules('titulo','Título','required');
				$this->form_validation->set_rules('imagem_logo','Imagem Logo Url','required');
				$this->form_validation->set_rules('url','Url Servidor','required');
				$this->form_validation->set_rules('porta','Porta Servidor','required');
				$this->form_validation->set_rules('perfil','Perfil Servidor','required');
				if($this->form_validation->run() == TRUE) {		
					$this->operadoras->updateOperadoras([
						'titulo' => $_POST['titulo'],
						'imagem_logo' => $_POST['imagem_logo'],
						'url' => $_POST['url'],
						'porta' => $_POST['porta'],
						'perfil' => $_POST['perfil'],
						'id_operadora' => $id_operadora
					]);
					$this->session->set_flashdata('success','Operadora salva com sucesso.');
					redirect('painel/operadora/editar/'.$id_operadora);	
				}							
			}

			$this->load->view('painel/operadoras/editar_operadora',[
				'operadora' => $operadora,
			]);
		} else {
			redirect('painel/operadoras');
		}

	}
	/**
	 * apagar_operadora
	 */
	public function apagar_operadora() 
	{	
		$id_operadora = $this->uri->segment(4);
		if($id_operadora != 0) {
			$operadora = $this->operadoras->getOperadoras(['id_operadora' => $id_operadora]);
			if (isset($_POST['apagar_operadora'])) {
				$this->operadoras->deleteOperadoras(['id_operadora' => $operadora['id_operadora']]);
				redirect('painel/operadoras');
			}
			$this->load->view('painel/operadoras/apagar_operadora',[]);
		} else {
			redirect('painel/operadoras');
		}
	}	
	/**----------------------------------------------------------------------------
	 *  								HISTORICO PAGAMENTOS
	 *-----------------------------------------------------------------------------*/
	/**
	 * historicos_pagamento
	 */
	public function historicos_pagamentos()
	{
		$historico_pagamentos = $this->historico_pagamentos->getHistoricoPagamentos();
		// resetar_historico_pagamento
		if (isset($_POST['resetar_historico_pagamento'])) {
			$this->historico_pagamentos->updateHistoricoPagamentos([
				'status' => COMPROVANTE_EM_AVALIACAO,
				'id_cliente_historico_pagamento' => $_POST['id_cliente_historico_pagamento']
			]);
			$this->session->set_flashdata('mensagem_sucesso','Status do histórico de pagamento alterado para <strong>Avaliação Pendente</strong>.');
			redirect('painel/historico/pagamentos');
		}
		// recusar_historico_pagamento
		if (isset($_POST['recusar_historico_pagamento'])) {
			$this->historico_pagamentos->updateHistoricoPagamentos([
				'status' => COMPROVANTE_REPROVADO,
				'id_cliente_historico_pagamento' => $_POST['id_cliente_historico_pagamento']
			]);
			$this->session->set_flashdata('mensagem_sucesso','Status do histórico de pagamento alterado para <strong>Recusado</strong>.');
			redirect('painel/historico/pagamentos');
		}
		// aceitar_historico_pagamento
		if (isset($_POST['aceitar_historico_pagamento'])) {
			$this->historico_pagamentos->updateHistoricoPagamentos([
				'status' => COMPROVANTE_APROVADO,
				'id_cliente_historico_pagamento' => $_POST['id_cliente_historico_pagamento']
			]);
			$this->session->set_flashdata('mensagem_sucesso','Status do histórico de pagamento alterado para <strong>Aprovado</strong>.');
			redirect('painel/historico/pagamentos');
		}
		$this->load->view('painel/historicos_pagamentos/lista',[
			'historico_pagamentos' => $historico_pagamentos,
		]);
	}
	/**
	 * novo_historico_pagamento
	 */
	// public function novo_historico_pagamento()
	// {

	// 	if (isset($_POST['novo_usuario'])) {
	// 		$this->form_validation->set_rules('usuario','Usuario','required|is_unique[cms_usuarios.usuario]');
	// 		$this->form_validation->set_rules('senha','Senha','required');

	// 		if($this->form_validation->run() == TRUE) {			
	// 			$data = $this->input->post();
	// 			$data['senha'] = password_hash($data['senha'],PASSWORD_DEFAULT);
	// 			unset($data['novo_usuario']);
	// 			$id_usuario = $this->usuarios->insertUsuarios($data);	
	// 			$this->session->set_flashdata('success','Usuario adicionado com sucesso.');
	// 			redirect('painel/usuario/editar/'.$id_usuario);				
	// 		}	
	// 	}
	// 	$this->load->view('painel/usuarios/novo_usuario',[]);
	// }
	/**
	 * apagar_historico_pagamento
	 */
	public function apagar_historico_pagamento() 
	{
		
		$id_cliente_historico_pagamento = $this->uri->segment(5);
		if($id_cliente_historico_pagamento != 0) {
			$historico_pagamento = $this->historico_pagamentos->getHistoricoPagamentos(['id_cliente_historico_pagamento' => $id_cliente_historico_pagamento]);
			if (isset($_POST['apagar_historico_pagamento'])) {
				$this->historico_pagamentos->deleteHistoricoPagamentos(['id_cliente_historico_pagamento' => $historico_pagamento['id_cliente_historico_pagamento']]);
				redirect('painel/historico/pagamentos');
			}
			$this->load->view('painel/historicos_pagamentos/apagar_historico_pagamento',[]);
		} else {
			redirect('painel/historico/pagamentos');
		}
	}		
	/**----------------------------------------------------------------------------
	 *  								CATEGORIAS
	 *-----------------------------------------------------------------------------*/
	/**
	 * categorias
	 */
	// public function categorias()
	// {
	// 	$categorias = $this->categorias_produtos->getCategorias();
	// 	$this->load->view('painel/categorias/lista',[
	// 		'categorias' => $categorias,
	// 	]);
	// }
	/**
	 * nova_categoria
	 */
	// public function nova_categoria()
	// {
	// 	if(isset($_POST['nova_categoria'])) {
	// 		$this->form_validation->set_rules('titulo','Título da Categoria','required');
	// 		$this->form_validation->set_rules('categoria_slug','Slug da Categoria','required|is_unique[cms_categorias_produtos.categoria_slug]');		
	// 		if($this->form_validation->run() == TRUE) {
	// 			$post = $this->input->post();
	// 			$data = [
	// 				'titulo' => $post['titulo'],
	// 				'descricao' => $post['descricao'],
	// 				'categoria_slug' => $post['categoria_slug'],
	// 			];
	// 			$this->categorias_produtos->insertCategorias($data);
	// 			redirect('painel/categorias');
	// 		}
	// 	}

	// 	$this->load->view('painel/categorias/nova_categoria',[]);				
	// }
	/**
	 * editar_categoria
	 */
	// public function editar_categoria()
	// {
	// 	$id_categoria_produto = empty($this->uri->segment(4)) ? null : $this->uri->segment(4);
	// 	if (isset($id_categoria_produto)) {
	// 		$categoria = $this->categorias_produtos->getCategorias(['id_categoria_produto' => $id_categoria_produto]);
	// 		if (isset($categoria)) {


	// 			if(isset($_POST['editar_categoria'])) {
	// 				$this->form_validation->set_rules('titulo','Título da Categoria','required');
	// 				if(isset($_POST['categoria_slug']) && $categoria['categoria_slug'] != $_POST['categoria_slug']) {
	// 					$this->form_validation->set_rules('categoria_slug','Slug da Categoria','required|is_unique[cms_categorias_produtos.categoria_slug]');
	// 				}
	// 				if($this->form_validation->run() == TRUE) {
	// 					$post = $this->input->post();
	// 					$data = [
	// 						'titulo' => $post['titulo'],
	// 						'descricao' => $post['descricao'],
	// 						'categoria_slug' => $post['categoria_slug'],
	// 						'id_categoria_produto' => $categoria['id_categoria_produto']
	// 					];
	// 					$this->categorias_produtos->updateCategorias($data);
	// 					redirect('painel/categoria/editar/'.$categoria['id_categoria_produto']);
	// 				}
	// 			}

	// 			$this->load->view('painel/categorias/editar_categoria',[
	// 				'categoria' => $categoria,
	// 			]);
	// 		}
	// 	}		
	// }
	/**
	 * deletar_categoria
	 */
	// public function deletar_categoria()
	// {
	// 	$id_categoria_produto = empty($this->uri->segment(4)) ? null : $this->uri->segment(4);
	// 	if (isset($id_categoria_produto)) {
	// 		$categoria = $this->categorias_produtos->getCategorias(['id_categoria_produto' => $id_categoria_produto]);
	// 		if (isset($categoria)) {


	// 			if(isset($_POST['deletar_categoria'])) {				
	// 				$data = [
	// 					'id_categoria_produto' => $categoria['id_categoria_produto'],
	// 				];
	// 				$this->categorias_produtos->deleteCategorias($data);
	// 				redirect('painel/categorias');				
	// 			}

	// 			$this->load->view('painel/categorias/deletar_categoria',[
	// 				'categoria' => $categoria,
	// 			]);
	// 		}
	// 	}		
	// }

	/**
	 * categorias_atualizar_posicao
	 */
	// public function categorias_atualizar_posicao ()
	// {
	// 	header('Content-type: application/json');
	// 	$post = $_POST['data'];
	// 	if (!empty($_POST)) {
	// 		foreach($post as $key => $value) {
	// 			$data = [
	// 				'id_categoria_produto' => $post[$key]['item_id'],
	// 				'posicao' => $post[$key]['posicao']
	// 			];
	// 			$this->categorias_produtos->updateCategorias($data);
	// 		}
	// 	}
	// 	echo json_encode($post);
	// }
	/**----------------------------------------------------------------------------
	 *  								PAGINAS
	 *-----------------------------------------------------------------------------*/
	public function paginas()
	{
		$paginas = $this->paginas->getPaginas();
		$this->load->view('painel/paginas/lista',[
			'paginas' => $paginas,
			'titulo' => 'Gerenciamento de Páginas'
		]);
	}
	/**
	 * nova_pagina
	 */
	public function nova_pagina()
	{
		if(isset($_POST['nova_pagina'])) {
			$this->form_validation->set_rules('titulo','Título da Página','required');
			$this->form_validation->set_rules('conteudo','Conteúdo da Página','required');
			$this->form_validation->set_rules('slug','Slug da Página','required|is_unique[cms_paginas.slug]');		
			if($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				if(!isset($post['nav_menu'])) $post['nav_menu'] = 0;
				$data = [
					'titulo' => $post['titulo'],
					'conteudo' => $post['conteudo'],
					//'subtitulo' => $post['subtitulo'],
					'nav_menu' => $post['nav_menu'],
					'slug' => $post['slug'],
				];
				$this->paginas->insertPaginas($data);
				redirect('painel/paginas');
			}
		}

		$this->load->view('painel/paginas/nova_pagina',[
			'titulo' => 'Nova Página'
		]);
				
	}
	/**
	 * editar_pagina
	 */
	public function editar_pagina()
	{
		$id_pagina = empty($this->uri->segment(4)) ? null : $this->uri->segment(4);
		if (isset($id_pagina)) {
			$pagina = $this->paginas->getPaginas(['id_page' => $id_pagina]);
			if (isset($pagina)) {


				if(isset($_POST['editar_pagina'])) {
					$this->form_validation->set_rules('titulo','Título da Página','required');
					if(isset($_POST['slug']) && $pagina['slug'] != $_POST['slug']) {
						$this->form_validation->set_rules('slug','Slug da Página','required|is_unique[cms_paginas.slug]');
					}
					if($this->form_validation->run() == TRUE) {
						$post = $this->input->post();
						if(!isset($post['nav_menu'])) $post['nav_menu'] = 0;
						$data = [
							'titulo' => $post['titulo'],
							'conteudo' => $post['conteudo'],
							//'subtitulo' => $post['subtitulo'],
							'nav_menu' => $post['nav_menu'],
							'slug' => $post['slug'],
							'id_page' => $pagina['id_page']
						];
						$this->paginas->updatePaginas($data);
						redirect('painel/pagina/editar/'.$pagina['id_page']);
					}
				}

				$this->load->view('painel/paginas/editar_pagina',[
					'pagina' => $pagina,
					'titulo' => 'Editar Página'
				]);
			}
		}		
	}
	/**
	 * deletar_pagina
	 */
	public function deletar_pagina()
	{
		
		$id_pagina = empty($this->uri->segment(4)) ? null : $this->uri->segment(4);
		if (isset($id_pagina)) {
			$pagina = $this->paginas->getPaginas(['id_page' => $id_pagina]);
			if (isset($pagina)) {


				if(isset($_POST['deletar_pagina'])) {				
					$data = [
						'id_page' => $pagina['id_page']
					];
					$this->paginas->deletePaginas($data);
					redirect('painel/paginas');				
				}

				$this->load->view('painel/paginas/deletar_pagina',[
					'pagina' => $pagina,
					'titulo' => 'Apagar Página'
				]);
			}
		}		
	}

	/**
	 * paginas_atualizar_posicao
	 */
	public function paginas_atualizar_posicao()
	{
		header('Content-type: application/json');
		$post = $_POST['data'];
		if (isset($_POST['data'])) {
			foreach($post as $key => $value) {
				$data = [
					'id_page' => $post[$key]['item_id'],
					'posicao' => $post[$key]['posicao']
				];
				$this->paginas->updatePaginas($data);
			}
		}
	}
	/**----------------------------------------------------------------------------
	 *  								CONFIGURACOES
	 *-----------------------------------------------------------------------------*/
	public function configuracoes()
	{
		$site = $this->site;
		if (isset($_POST['configuracoes_submit'])) {
			$post = $this->input->post();
			unset($post['configuracoes_submit']);
			$this->configuracores->updateSiteConfig($post);
			redirect('painel/configuracoes');
		}
		$this->load->view('painel/configuracoes/configuracoes',[
			'site' => $site,
			'titulo' => 'Configurações do Site'
		]);
	}
	/**----------------------------------------------------------------------------
	 *  								LOGOUT
	 *-----------------------------------------------------------------------------*/
	public function logout()
	{
		$this->session->unset_userdata('user_painel_data');
		$this->session->sess_destroy();
		redirect('painel');
	}
	/**----------------------------------------------------------------------------
	 *  								FUNÇÕES
	 *-----------------------------------------------------------------------------*/
	/**
	 * buscar_ajax
	 */
	public function buscar_ajax()
	{
		header('Content-type: application/json');
		$action = empty($this->uri->segment(3)) ? null : $this->uri->segment(3); 
		switch ($action) {
			case 'produtos':
				$produtos = $this->produtos->searchProdutos([
					'search' => $_POST['search']
				]);
				$data = [
					'template' => $this->load->view('painel/produto/acessorios/search_acessorios_template',[
						'produtos' => $produtos
					],TRUE)
				];
			break;
		}
		echo json_encode($data);
	}

	/**
	 * set_upload_options
	 */
	private function set_upload_options()
	{   

		$config = array();
		$config['upload_path']          = './public/images/uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 1024 * 10;
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;

		return $config;
	}
	/**
	 * compress_image
	 */
	function compress_image($file, $quality) {
		$setting['image_path'] = './public/images/uploads/';
		$setting['image_name'] = $file;
		$setting['compress_path'] = './public/images/uploads/';
		$setting['jpg_compress_level'] = $quality;
		$setting['png_compress_level'] = $quality;
		$this->load->library('imgcompressor', $setting);
		$result = $this->imgcompressor->do_compress();
	}
}
