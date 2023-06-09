<?php
namespace Opencart\Catalog\Controller\Common;
class Home extends \Opencart\System\Engine\Controller {
	public function index(): void {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');

		$data['content_banner'] = $this->load->controller('common/content_banner');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		
		$d['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language'));
		$data['section_best_deals'] = $this->load->view('common/section_best_deals', $d);
		$data['section_members'] = $this->load->view('common/section_members');
		$data['section_ads'] = $this->load->view('common/section_ads');

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}