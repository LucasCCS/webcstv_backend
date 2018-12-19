<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer \ PHPMailer \PHPMailer;
use PHPMailer \ PHPMailer \Exception;

class Site extends CI_Controller {

	public $site;
	public $cliente;
	public $cliente_servidor_principal;
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('site_model','site');
		$this->load->model('clientes_model','clientes');
		$this->load->model('planos_model','planos');
		$this->load->model('subplanos_model','sub_planos');
		$this->load->model('faq_model','faq');
		$this->load->model('metodospagamento_model','metodos_pagamento');
		$this->load->model('operadoras_model','operadoras');
		$this->load->model('clienteoperadoras_model','cliente_operadoras');
		$this->load->model('clientehistoricopagamentos_model','historico_pagamentos');
		$this->load->model('guiasinstalacao_model','guia_instalacao');
		$this->load->model('servidorusers_model','servidor_users');
		$this->load->library('form_validation');
		// 
		$this->load->helper('url');
		// Custom Libraries
		$this->load->library('sitemenu');
		$this->load->library('auth');
	
		/**
		 * getSiteConfig
		 */
		$this->site = $this->site->getSiteConfig();
		/**
		 * $cliente
		 */
		if($this->auth->checkCustomerAuth()) {
			if(empty($this->cliente)) $this->cliente = $this->session->userdata('customer_painel_data');
		}
		
	}
	/**
	 * index
	 */
	public function index()
	{
		$pagina_slug = empty($this->uri->segment(1)) ? null : $this->uri->segment(1);

		switch($pagina_slug) {
			case 'email':
				$email_template = empty($this->uri->segment(2)) ? null : $this->uri->segment(2);
				self::email($email_template);
			break;
			case 'planos':
				self::planos();
			break;
			case 'revenda':
				self::revenda();
			break;
			case 'duvidas-frequentes':
				self::duvidas_frequentes();
			break;
			case 'contato':
				self::contato();
			break;
			case 'cadastro':
				self::cadastro();
			break;
			default:
				self::pagina($pagina_slug);
			break;
		}
	}
	/**
	 * post_login
	 */
	public function post_login()
	{
		if (isset($_POST)) {
			$login = [
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			];
			if ($this->auth->loginCustomer($login)) {
				redirect('conta/principal');
			} else {
				$this->session->set_flashdata('validation_errors','Verifique os dados informados e tente novamente!');
				redirect('conta/entrar');
			}
		}
	}
	/**
	 * recovery
	 */
	public function recovery()
	{
		if ($this->auth->checkCustomerAuth()) redirect('conta');
		if (isset($_POST['recuperar_conta'])) {
			$this->form_validation->set_rules('email','E-mail','required');
			if ($this->form_validation->run() == TRUE) {
				
					$recoveryUser = $this->clientes->getClientes([
						'email' => $_POST['email']
					]);

					//  send_mail($from,$from_name,$reply_to,$reply_name,$address,$address_name,$subject,$body) 
					if (isset($recoveryUser)) {
						$codigo_mudanca_senha = base64_encode(intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9)));
						$this->clientes->updateClientes([
							'id_cliente' => $recoveryUser['id_cliente'],
							'codigo_mudanca_senha' => $codigo_mudanca_senha
						]);
						$recoveryUser['codigo_mudanca_senha'] = $codigo_mudanca_senha;
						$recoveryUser['url_change'] = base_url().'conta/alterar/senha/'.$codigo_mudanca_senha;
						
						$this->send_mail(
							$this->site['email_formularios'],
							$this->site['titulo'],
							$this->site['email_formularios'],
							$this->site['titulo'],
							$recoveryUser['email'],
							$recoveryUser['nome'],
							'Mudança de Senha',
							$this->load->view('mail/templates/recovery_template',['cliente' => $recoveryUser],TRUE)
						);
						$this->session->set_flashdata('codigo_sucesso','Um E-mail de recuperação foi enviado para o e-mail informado.');
						redirect('conta/recuperar');
					} else {
						$this->session->set_flashdata('codigo_error','O E-mail informado não foi localizado em nosso sistema.');
						redirect('conta/recuperar');
					}
					
				
			}
		}
		$this->load->view('site/recuperar_conta',[
			'titulo' => ['Ative sua Conta',$this->site['titulo']],
		]);	
	}
	/**
	 * change_password
	 */
	public function change_password() 
	{
		$codigo_mudanca_senha = $this->uri->segment(4);
		if (!empty($codigo_mudanca_senha)) {
			$usuario = $this->clientes->getClientes(['codigo_mudanca_senha' => $codigo_mudanca_senha]);
			if(isset($usuario)) {
				if (isset($_POST['mudar_senha_conta'])) {
					$this->form_validation->set_rules('senha','Senha','required|min_length[8]');
					$this->form_validation->set_rules('r_senha','Repita sua Senha','required|min_length[8]|matches[senha]');
					if($this->form_validation->run() == TRUE) {
						$post = $this->input->post();
						$data = [
							'codigo_mudanca_senha' => '',
							'senha' => md5($post['senha']),
							'id_cliente' => $usuario['id_cliente']
						];
						$this->clientes->updateClientes($data);
						$this->session->set_flashdata('codigo_sucesso','Senha alterada com sucesso.');
						$this->session->set_flashdata('not_redirect',true);
						redirect('conta/alterar/senha/'.$codigo_mudanca_senha);
					} 
				}
			} else {
				if($this->session->flashdata('not_redirect') != true) redirect('');
			}
			$this->load->view('site/mudar_senha_conta',[
				'titulo' => ['Recuperar Senha',$this->site['titulo']],
			]);	
		} else {
			if($this->session->flashdata('not_redirect') != true) redirect('');
		}
	}
	/**
	 * conta_alterar_senha
	 */
	public function conta_alterar_senha() {
		if (isset($_POST['mudar_senha_conta'])) {	
				
			$this->form_validation->set_rules('senha_atual','Senha Atual','required');
			$this->form_validation->set_rules('senha','Senha','required|min_length[8]');
			$this->form_validation->set_rules('r_senha','Repita sua Senha','required|min_length[8]|matches[senha]');
			if($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				
				if(md5($post['senha_atual']) == $this->cliente['senha']) {
					$data = [
						'senha' => md5($post['senha']),
						'id_cliente' => $this->cliente['id_cliente']
					];
					$this->cliente['senha'] = md5($post['senha']);
					$this->session->set_userdata('customer_painel_data', $this->cliente);
					$this->clientes->updateClientes($data);
					$this->session->set_flashdata('codigo_sucesso','Senha alterada com sucesso.');
					$this->session->set_flashdata('not_redirect',true);
					redirect('conta/alterar/senha');
				} else {
					
					$this->session->set_flashdata('codigo_erro','Senha Atual informada não corresponde com a cadastrada.');
					redirect('conta/alterar/senha');
				}
			} 
		}
		$this->load->view('site/conta/painel/alterar_senha',[
			'titulo' => ['Alterar Senha',$this->site['titulo']],
		]);	
	}
	/**
	 * conta_alterar_email
	 */
	public function conta_alterar_email() {
		if (isset($_POST['mudar_email_conta'])) {	
				
			$this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[cms_clientes.email]');
			$this->form_validation->set_rules('r_email','Repita seu E-mail','required|valid_email|matches[email]');
			if($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				
				if($post['email'] != $this->cliente['email']) {
					$data = [
						'email' => $post['email'],
						'id_cliente' => $this->cliente['id_cliente']
					];
					$this->cliente['email'] = $post['email'];
					$this->session->set_userdata('customer_painel_data', $this->cliente);
					$this->clientes->updateClientes($data);
					$this->session->set_flashdata('codigo_sucesso','E-mail alterada com sucesso.');
					$this->session->set_flashdata('not_redirect',true);
					redirect('conta/alterar/email');
				} else {
					
					$this->session->set_flashdata('codigo_erro','Você já utiliza este e-mail.');
					redirect('conta/alterar/email');
				}
			} 
		}
		$this->load->view('site/conta/painel/alterar_email',[
			'titulo' => ['Alterar E-mail',$this->site['titulo']],
		]);	
	}
	/**
	 * conta_alterar_operadora
	 */
	public function conta_alterar_operadora()
	{
		if (isset($_POST['mudar_operadora_conta'])) {
			if (count($_POST['operadora']) < $this->cliente['operadoras'] || count($_POST['operadora']) > $this->cliente['operadoras']) {
				
				$this->session->set_flashdata('codigo_erro','Você deve selecionar <strong>'.$this->cliente['operadoras'].'</strong> operadora(s).');
				redirect('conta/alterar/operadora');
			} else {
				$this->cliente_operadoras->deleteClienteOperadoras(['id_cliente' => $this->cliente['id_cliente']]);
				$operadoras = $_POST['operadora'];
				foreach($operadoras as $key => $value) {
					$this->cliente_operadoras->insertClienteOperadoras([
						'id_cliente'=> $this->cliente['id_cliente'],
						'id_operadora' => $operadoras[$key]
					]);
				}
				if($this->cliente['operadoras'] > 1) $this->session->set_flashdata('codigo_sucesso','As operadoras de seu plano de assinatura foram alteradoras com sucesso.');
				else $this->session->set_flashdata('codigo_sucesso','A operadora de seu plano de assinatura foi alterado com sucesso.');
			}
		}
		$this->load->view('site/conta/painel/alterar_operadora',[
			'titulo' => ['Alterar Operadora',$this->site['titulo']],
			'operadoras' => $this->operadoras->getOperadoras(),
			'cliente_operadoras' => $this->cliente_operadoras->getClienteOperadoras(['id_cliente' => $this->cliente['id_cliente']])
		]);	
	}
	/**
	 * conta_dados_assinatura
	 */
	public function conta_dados_assinatura()
	{
		$this->load->view('site/conta/painel/dados_assinatura',[
			'titulo' => ['Dados da Assinatura',$this->site['titulo']],
			'cliente_operadoras' => $this->cliente_operadoras->getClienteOperadoras(['id_cliente' => $this->cliente['id_cliente']])
		]);		
	}
	/**
	 * conta_novo_pagamento
	 */
	public function conta_novo_pagamento()
	{
		$this->load->view('site/conta/painel/novo_pagamento',[
			'titulo' => ['Dados da Assinatura',$this->site['titulo']],
			'sub_planos' => $this->sub_planos->getSubPlanos(['id_plano' => $this->cliente['id_plano']]),
			'metodos_pagamento' => $this->metodos_pagamento->getMetodosPagamento(),
			'cliente_operadoras' => $this->cliente_operadoras->getClienteOperadoras(['id_cliente' => $this->cliente['id_cliente']])
		]);		
	}
	/**
	 * conta_historico_pagamento
	 */
	public function conta_historico_pagamento()
	{
		/**
		 * cancel_historico_pagamento
		 */
		if (isset($_POST['cancel_historico_pagamento'])) {
			$this->historico_pagamentos->updateClienteHistoricoPagamentos([
				'status' => COMPROVANTE_CANCELADO_USUARIO,
				'id_cliente_historico_pagamento' => $_POST['cancel_historico_pagamento']
			]);

			$this->session->set_flashdata('comprovante_status','Envio de comprovante cancelado com sucesso!');
		}
		/**
		 * conta_enviar_pagamento
		 */
		if (isset($_POST['enviar_comprovante'])) {
			$config['upload_path']          = 'public/images/uploads/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$this->session->set_flashdata('comprovante_error',$this->upload->display_errors());
			}
			else
			{
				$upload = $this->upload->data();
				$this->session->set_flashdata('comprovante_success','Comprovante de pagamento enviado com sucesso!');		
				$this->historico_pagamentos->insertClienteHistoricoPagamentos([
					'observacoes' => $_POST['observacoes'],
					'comprovante_imagem' => base_url('public/images/uploads/'.$upload['file_name']),
					'data_pagamento' => time(),
					'status' => COMPROVANTE_EM_AVALIACAO,
					'id_plano' => $this->cliente['id_plano'],
					'id_cliente' => $this->cliente['id_cliente']
				]);
			}		
			redirect('conta/pagamentos/historico');
		}
		$this->load->view('site/conta/painel/historico_pagamentos',[
			'titulo' => ['Histórico de Pagamentos',$this->site['titulo']],
			'historico_pagamentos' => $this->historico_pagamentos->getClienteHistoricoPagamentos(['id_cliente' => $this->cliente['id_cliente']])
		]);	
	}
	/**
	 * conta_guia_instalacao
	 */
	public function conta_guia_instalacao()
	{
		$this->load->view('site/conta/painel/guia_instalacao',[
			'titulo' => ['Guias de Instalação',$this->site['titulo']],
			'guias_instalacao' => $this->guia_instalacao->getGuiaInstalacao([])
		]);	
	}	
	/**
	 * gerar_teste
	 */
	public function gerar_teste($param,$param2)
	{
		$cliente_atualizado = $this->clientes->getClientes(['id_cliente' => $this->cliente['id_cliente']]);
		if ($cliente_atualizado['codigo_teste'] == $param) {
			$this->clientes->updateClientes([
				'id_cliente' => $this->cliente['id_cliente'],
				'codigo_teste' => ''
			]);
			
			$this->load->view('site/conta_gerar_teste',[
				'titulo' => ['Gerar Teste',$this->site['titulo']],
				'url_teste' => $param2,
			]);	
		} else {
			redirect('');
		}
	}
	// gerador_teste
	public function gerador_teste() {
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *'); 
		$data = [
			'template' => $this->load->view('site/gerador_page_teste',[],TRUE)
		];
		echo json_encode($data);
	}
	/**
	 * envio_comprovante_pagamento
	 */
	public function envio_comprovante_pagamento()
	{
		header('Content-type: application/json');
		if (isset($_POST)) {
			$this->form_validation->set_rules('email','E-mail de Acesso','required|email_valid');
			if ($this->form_validation->run() == TRUE) {

			}
		}
		echo json_encode($data);
	}
	/**
	 * logout
	 */
	public function logout()
	{
		session_destroy();
		redirect('');
	}
	/** 
	 * paginas 
	 */
	function pagina() 
	{
		$pagina_slug = empty($this->uri->segment(1)) ? null : $this->uri->segment(1);

		// $pagina_slug
		if($pagina_slug != null) {
			$pagina = $this->paginas->getPaginas([
				'slug' => $pagina_slug
			]);

			if (isset($pagina)) {
				$this->load->view('site/pagina',[
					'titulo' => [$pagina['titulo'],$this->site['titulo']],
					'pagina' => $pagina
				]); 
			} else {
				$this->load->view('site/erros/error_404'); 
			}

		} else {
			$this->load->view('site/home',[
				'planos_cs_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_MENSAL]),
				'planos_cs_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
				'planos_cs_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
				'planos_iptv_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_MENSAL]),
				'planos_iptv_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
				'planos_iptv_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
				'faq' => $this->faq->getFaq(),
				'titulo' => [$this->site['titulo'],$this->site['slogan']],
			]);
		}
	}
	/**
	 * perguntas_frequentes
	 */
	function duvidas_frequentes() {
		$this->load->view('site/perguntas-frequentes',[
			'faq' => $this->faq->getFaq(),
			'titulo' => ['Dúvidas Frequentes',$this->site['titulo']],
		]);
	}
	/**
	 * conta
	 */
	public function conta()
	{
		if($this->cliente['status'] == CLIENTE_INATIVO) redirect('conta/ativacao');
		// if (!$this->auth->checkCustomerAuth()) redirect('');
		$this->load->view('site/conta/painel/index',[
			'titulo' => ['Minha Conta',$this->site['titulo']],	
		]);
	}
	/**
	 * planos
	 */
	public function planos()
	{
		$this->load->view('site/planos',[
			'planos_cs_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_MENSAL]),
			'planos_cs_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
			'planos_cs_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
			'planos_iptv_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_MENSAL]),
			'planos_iptv_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
			'planos_iptv_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
			'titulo' => ['Planos CardSharing',$this->site['titulo']],
		]);
	}
	/**
	 * revenda
	 */
	public function revenda()
	{
		$this->load->view('site/revenda',[
			'titulo' => ['Planos de Revenda',$this->site['titulo']],
		]);
	}
	/**
	 * contato
	 */
	public function contato()
	{
		$this->load->view('site/contato',[
			'titulo' => ['Fale Conosco',$this->site['titulo']],
		]);
	}
	/**
	 * cadastro
	 */
	public function cadastro()
	{	
		if ($this->auth->checkCustomerAuth() && $this->cliente['status'] == CLIENTE_INATIVO) redirect('conta/ativacao');
		else if($this->auth->checkCustomerAuth() && $this->cliente['status'] != CLIENTE_INATIVO) redirect('');
		$this->load->view('site/cadastro',[
			'titulo' => ['Experimente gratuitamente',$this->site['titulo']],
			'planos_cs_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_MENSAL]),
			'planos_cs_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
			'planos_cs_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_CS, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
			'planos_iptv_mensal' => $this->planos->getPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_MENSAL]),
			'planos_iptv_trimestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_TRIMESTRAL]),
			'planos_iptv_semestral' => $this->sub_planos->getSubPlanos(['plano_tipo' => PLANO_TIPO_IPTV, 'periodicidade' => PERIODICIDADE_SEMESTRAL]),
		]);
	}
	/**
	 * login
	 */
	public function login()
	{	
		if ($this->auth->checkCustomerAuth() && $this->cliente['status'] == CLIENTE_INATIVO) redirect('conta/ativacao');
		else if($this->auth->checkCustomerAuth() && $this->cliente['status'] != CLIENTE_INATIVO) redirect('');
		$this->load->view('site/login',[
			'titulo' => ['Central do Cliente',$this->site['titulo']],
		]);
	}
	/**
	 * post_cadastro
	 */
	public function post_cadastro()
	{
		if (isset($_POST)) {
			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('telefone','Telefone Celular','required|is_unique[cms_clientes.telefone]');
			$this->form_validation->set_rules('email','E-mail','required|is_unique[cms_clientes.email]|valid_email');
			$this->form_validation->set_rules('senha','Senha','required|min_length[8]');
			if($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				$codigo_ativacao = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
				$user_servidor = strtolower(substr($post['nome'],0,4)).rand(1,100) . rand(1,100); 
				$pass_servidor = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
				self::cadastro_usuario($post,$codigo_ativacao,$user_servidor,$pass_servidor);
				redirect('conta/ativacao');
			} else {
				$this->session->set_flashdata('validation_errors',validation_errors());
				redirect('cadastro');
			}
		}
	}
	/**
	 * cadastro_ativacao
	 */
	public function cadastro_ativacao()
	{
		
		if ($this->cliente['status'] != CLIENTE_INATIVO && $this->session->flashdata('no_redirect') === null) redirect('');
		if (isset($_POST['ativar_cadastro'])) {
			$this->form_validation->set_rules('codigo_ativacao','Código de Ativação','required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->cliente['codigo_ativacao'] == $_POST['codigo_ativacao']) {
					$this->cliente['status'] = CLIENTE_ATIVO;
					$this->clientes->updateClientes([
						'id_cliente' => $this->cliente['id_cliente'],
						'status' => CLIENTE_ATIVO
					]);
					$this->session->set_userdata('customer_painel_data', $this->cliente);

					$cliente_atualizado = $this->clientes->getClientes(['id_cliente' => $this->cliente['id_cliente']]);
					// cliente_servidor
					
					// send_mail
					$this->send_mail(
						$this->site['email_formularios'],
						$this->site['titulo'],
						$this->site['email_formularios'],
						$this->site['titulo'],
						$this->cliente['email'],
						$this->cliente['nome'],
						'Conta Ativada com Sucesso',
						$this->load->view('mail/templates/ativacao_net_template',[
							'cliente' => $this->cliente,
							'site_url' => base_url(),
							'teste_url' => base_url().'conta/gerar/teste/'.$this->cliente['codigo_teste'].'/'.base64_encode($this->cliente['url_teste']),
							'site' => $this->site
						],TRUE)
					);
					$this->session->set_flashdata('no_redirect','true');
					$this->session->set_flashdata('codigo_sucesso','sucesso');
					redirect('conta/ativacao');			
					
				} else {
					$this->session->set_flashdata('codigo_error','O código de ativação informado não é valido, verifique-o e tente novamente!');
					redirect('conta/ativacao');
				}
			}
		}
		$this->load->view('site/cadastro_ativacao',[
			'titulo' => ['Ative sua Conta',$this->site['titulo']],
		]);	
	}

	/**
	 * email
	 */
	function email($template)
	{
		$this->load->view('mail/templates/'.$template.'.php',[]);
	}
	public function send_contact_ajax()
	{
		header('Content-type: application/json');
		if (isset($_POST)) {
			$this->form_validation->set_rules('nome','Seu Nome','required');
			$this->form_validation->set_rules('email','Seu E-mail','required|valid_email');
			$this->form_validation->set_rules('telefone','Seu Telefone','required');
			$this->form_validation->set_rules('mensagem','Sua Mensagem','required|min_length[20]');	
			if($this->form_validation->run() == TRUE) {
				$post = $this->input->post();
				$data = [
					'status' => true
				];
				$this->send_mail(
					$this->site['email_formularios'],
					'Novo Contato ('.$post['nome'].')',
					$post['email'],
					$post['nome'],
					'sistemas@inovlab.com.br',
					$this->site['titulo'],
					'Novo Contato',
					$this->load->view('mail/templates/contato_template',['contato' => $post],TRUE)
				);
			} else {
				$data = [
					'status' => false,
					'errors' => validation_errors('<div class="alert alert-danger">','</div>')
				];
			}
		}
		echo json_encode($data);		
	}
	/**
	 * cadastro_usuario
	 */
	function cadastro_usuario($post,$codigo_ativacao,$user_servidor,$pass_servidor) {	
		// operadoras
		if(isset($post['operadora'])) $operadoras = $post['operadora'];
		$servidor_operadoras = array();
		$plano = $this->planos->getPlanos(['id_plano' => $post['id_plano']]);
		$nome_sobrenome = explode(' ',$post['nome']);
		if(!isset($nome_sobrenome[1])) $nome_sobrenome[1] = "";

	
		$cliente_data = [
			'nome' => $post['nome'],
			'usuario' =>$user_servidor,
			'telefone' => $post['telefone'],
			'email' => $post['email'],
			'id_plano' => $post['id_plano'],
			'codigo_teste' => md5($post['nome']),
			'codigo_ativacao' => $codigo_ativacao,
			'senha' => md5($post['senha'])
		];
		
		$id_cliente = $this->clientes->insertClientes($cliente_data);
		$this->auth->loginCustomer([
			'email' =>$post['email'],
			'senha' => $post['senha']
		]);
		// send_sms($numero,$campanha,$texto)
		$telefone = str_replace(' ','',(str_replace('-','',str_replace('(','',str_replace(')','',$post['telefone'])))));
		self::send_sms($telefone,'Seu código de ativação','O seu código de ativação é: '.$codigo_ativacao.'.');	
	}

	/**
	 * send_sms
	 */
	function send_sms($numero,$campanha,$texto) {
		$ch = curl_init();
		$data = http_build_query([
			'codigo' => '176',
			'token' => '02aa629c8b16cd17a44f3a0efec2feed43937642',
			'tipo' => '1',
			'campanha' => $campanha,
			'textosms' => $texto,
			'numero' => $numero
		]);
		curl_setopt($ch, CURLOPT_URL,"http://178.33.136.60/api/api_sistema.php?".$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
		$server_output = curl_exec ($ch);
		// echo $server_output;
		curl_close ($ch);
		
	}
	
	/**
	 * send_mail
	 */
	function send_mail($from,$from_name,$reply_to,$reply_name,$address,$address_name,$subject,$body) 
	{
		$mail = new PHPMailer;
		//$mail->SMTPDebug = 3;
		$mail->CharSet = 'UTF-8';   
		$mail->isSMTP();
		$mail->Host = 'br700.hostgator.com.br';
		$mail->SMTPAuth = true;
		$mail->Username = 'sistemas@inovlab.com.br';
		$mail->Password = 'santos1996';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		
		$mail->setFrom($from, $from_name);
		$mail->addReplyTo($reply_to, $reply_name);
		$mail->addAddress($address,$address_name);
		//$mail->addAttachment('local_do_anexo/arquivo.extenção', 'NomeAmigavel.extenção');
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $body;
		//$mail->AltBody = 'Conteúdo alternativo (em texto simples), caso destinatário não possa receber em HTML';
		
		if(!$mail->send()) {
			// echo 'Contato não pode ser enviado.';
			// echo 'Erro: ' . $mail->ErrorInfo;
		} else {
			// echo 'Contato enviado com sucesso!';
		}
	}
}
