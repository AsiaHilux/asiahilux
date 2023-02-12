<?php

/**
 *
 */
class Home_model extends CI_Model
{
	public function insert($table, $data)
	{
		$this->db->insert($table, $this->security->xss_clean($data));
		return $this->db->insert_id();
	}

	public function get_all_cars()
	{
		$data = $this->db->select('hv_car_details.car_d_id, hv_car_details.carprice, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
			->join('hv_car_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.s_no = 0', 'left')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active', 1)
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_models.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('si_countries.active', 1)
			->group_by("hv_car_details.car_d_id")
			->order_by("hv_car_details.car_d_id", "DESC")
			->limit(10)
			->get('hv_car_details')
			->result_array();
		return $data;
	}

	public function get_discounted()
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.carprice, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.s_no = 0', 'left');
		$this->db->where('hv_car_details.car_tag', 1);
		$this->db->where('hv_car_details.is_active', 1);
		$this->db->where('hv_car_details.is_trash', 0);
		$this->db->where('hv_car_manufacturer.active', 1);
		$this->db->where('hv_car_models.active', 1);
		$this->db->limit(10);
		return $this->db->get()->result_array();
	}

	public function get_clearance()
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.carprice, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.s_no = 0', 'left');
		$this->db->where('hv_car_details.car_tag ', 2);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_details.is_active', 1);
		$this->db->where('hv_car_details.is_trash', 0);
		$this->db->where('hv_car_models.active ', 1);
		$this->db->limit(10);
		return $this->db->get()->result_array();
	}
	
	public function getDiffCarModels($carid, $id,$make_id)
	{
		$this->db->select('hv_car_details.*, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details')
		->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
		->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_models.vm_id !='. $make_id);
		$this->db->where('hv_car_models.m_id !='. $id);
		$this->db->where('hv_car_details.car_d_id !=', $carid);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1)->where('si_countries.active', 1)
		->group_by("hv_car_details.car_d_id");
		return $this->db->limit(6)->get()->result_array();
	}
	
	public function getSameCarModels($carid, $id)
	{
		$this->db->select('hv_car_details.*, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details')
		->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
		->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_models.m_id', $id);
		$this->db->where('hv_car_details.car_d_id !=', $carid);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1)->where('si_countries.active', 1)
		->group_by("hv_car_details.car_d_id");
		return $this->db->limit(10)->get()->result_array();
	}

	public function get_manufacturer()
	{
		return $this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->select('hv_car_manufacturer.vm_id,hv_car_manufacturer.vm_name')
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active ', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('hv_car_models.active', 1)
			->where('si_countries.active', 1)
// 			->group_by("hv_car_details.car_d_id")
			->group_by('hv_car_manufacturer.vm_id')
			->get('hv_car_details')
			->result_array();
	}

    public function get_search_by_type_list_Count()
	{
		return $this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->select('hv_car_bodytype.bodytype_id,hv_car_bodytype.bodytype_name,COUNT(hv_car_bodytype_details.bodytype_id) AS make_count')
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active ', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('hv_car_models.active', 1)
			->where('si_countries.active', 1)
			->group_by('hv_car_bodytype.bodytype_id')
			->get('hv_car_details')
			->result_array();
	}
	
	public function body_type()
	{
		return $this->db->join('hv_car_details', 'hv_car_details.car_d_id = hv_car_bodytype_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->select('hv_car_bodytype.bodytype_id,hv_car_bodytype.bodytype_name')
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_models.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('si_countries.active', 1)
// 			->group_by("hv_car_details.car_d_id")
			->group_by('hv_car_bodytype_details.bodytype_id')
			->get('hv_car_bodytype_details')
			->result_array();
	}

	public function get_all_cars_count()
	{
		$data = $this->db->select('hv_car_details.car_d_id')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active', 1)
			->where('hv_car_models.active', 1)
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('si_countries.active', 1)
			->group_by("hv_car_details.car_d_id")
			->get('hv_car_details')
			->result_array();
		return $data;
	}

	public function get_model_count()
	{
		return $this->db->select('hv_car_models.m_id,hv_car_models.model_name,COUNT(hv_car_models.m_id) AS make_count')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active', 1)
			->where('hv_car_models.active', 1)
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('si_countries.active', 1)
			// ->group_by("hv_car_details.car_d_id")
			->group_by('hv_car_models.m_id')
			->get('hv_car_details')
			->result_array();
	}

    public function get_make_count()
	{
		return $this->db->select('hv_car_manufacturer.vm_id,hv_car_manufacturer.vm_name,hv_car_manufacturer.stored_file_name,COUNT(hv_car_details.vm_id) AS make_count')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left')
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active', 1)
			->where('hv_car_models.active', 1)
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->where('si_countries.active', 1)
			// ->group_by("hv_car_details.car_d_id")
			->group_by('hv_car_manufacturer.vm_id')
			->get('hv_car_details')
			->result_array();
	}
	public function get_make_count_country()
	{
		return $this->db->select('hv_car_details.car_d_id,si_countries.*,COUNT(si_countries_details.country_detail_id) AS country_count')
// 			->join('(
// 				SELECT car_d_id,country_detail_id
// 				FROM si_countries_details
// 				GROUP BY car_d_id 
// 			) as si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id')
			->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id')
			->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id')
			->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left')
			->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left')
			->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left')
			->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left')
			->where('hv_car_details.horizon_id', 1)
			->where('hv_car_manufacturer.active', 1)
			->where('hv_car_models.active', 1)
			->where('si_countries.active', 1)
			->where('hv_car_bodytype.active', 1)
			->where('hv_car_details.is_active', 1)
			->where('hv_car_details.is_trash', 0)
			->group_by('si_countries_details.country_detail_id')
			->get('hv_car_details')
			->result_array();
	}

	

	public function get_all_cars_for_sys()
	{
		$this->db->select('hv_car_details.*, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		$this->db->where('hv_car_details.is_active', 1);
		$this->db->where('hv_car_details.is_trash', 0);
		return $this->db->get()->result_array();
	}

	
	public function get_hv_port_country()
	{
		$this->db->select('si_countries.*, hv_port_country.hv_port_country_id');
		$this->db->from('si_countries');
		$this->db->join('hv_port_country', 'hv_port_country.country_id = si_countries.country_id');
		return $this->db->get()->result_array();
	}
	public function get_selected_cars($clearance_sale, $make_id, $module, $fuel, $drivetrain, $price_from, $price_to, $body_type, $steering, $transmission, $mileage_from, $mileage_to, $engine_capacity_from, $year_from, $month_from, $year_to, $month_to, $sort, $discounted, $refrence_no, $car_tag)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.ManufactureYear, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name, hv_car_bodytype_details.*,images.stored_file_name,images.file_path');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');

		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		if ($clearance_sale == true) {
			$this->db->where('hv_car_details.car_tag', $clearance_sale);
		}
		if ($make_id == true) {
			$this->db->where('hv_car_details.vm_id', $make_id);
		}
		if ($module == true) {
			$this->db->where('hv_car_details.m_id', $module);
		}
		if ($fuel == true) {
			$this->db->where('hv_car_details.Fuel', $fuel);
		}
		if ($drivetrain == true) {
			$this->db->where('hv_car_details.Drivetrain', $drivetrain);
		}
		if ($price_from == true) {
			$this->db->where('hv_car_details.carprice >=', $price_from);
		}
		if ($price_to == true) {
			$this->db->where('hv_car_details.carprice <=', $price_to);
		}
		if ($body_type == true) {
			$this->db->where('hv_car_bodytype_details.bodytype_id', $body_type);
		}
		if ($steering == true) {
			$this->db->where('hv_car_details.Steering', $steering);
		}
		if ($transmission == true) {
			$this->db->where('hv_car_details.Transmission', $transmission);
		}
		if ($mileage_from == true) {
			$this->db->where('hv_car_details.Mileage >=', $mileage_from);
		}
		if ($mileage_to == true) {
			$this->db->where('hv_car_details.Mileage <=', $mileage_to);
		}
		if ($engine_capacity_from == true) {
			$this->db->where('hv_car_details.EngineSize', $engine_capacity_from);
		}
		if ($year_from == true) {
			$this->db->where('hv_car_details.RegistrationYear >=', $year_from);
		}
		if ($month_from == true) {
			$this->db->where('hv_car_details.RegistrationMonth >=', $month_from);
		}
		if ($year_to == true) {
			$this->db->where('hv_car_details.RegistrationYear <=', $year_to);
		}
		if ($month_to == true) {
			$this->db->where('hv_car_details.RegistrationMonth <=', $month_to);
		}
		if ($sort == true) {
			if ($sort == "mileage_desc") {
				$this->db->order_by('hv_car_details.Mileage', 'DESC');
			}
			if ($sort == "price_asc") {
				$this->db->order_by('hv_car_details.carprice', 'ASC');
			}
			if ($sort == "year_asc") {
				$this->db->order_by('hv_car_details.RegistrationMonth', 'ASC');
			}
			if ($sort == "mileage_asc") {
				$this->db->order_by('hv_car_details.Mileage', 'ASC');
			}
			if ($sort == "year_desc") {
				$this->db->order_by('hv_car_details.RegistrationMonth', 'DESC');
			}
			if ($sort == "sort_id_desc") {
				$this->db->order_by('hv_car_details.car_d_id', 'DESC');
			}
			if ($sort == "price_desc") {
				$this->db->order_by('hv_car_details.carprice', 'DESC');
			}
		}
		if ($discounted == true) {
			$this->db->where('hv_car_details.car_tag', $discounted);
		}
		if ($refrence_no == true) {
			$this->db->where('hv_car_details.VehicleNo', $refrence_no);
		}
		if ($car_tag == true) {
			$this->db->where('hv_car_details.car_tag', $car_tag);
		}
		return $this->db->get('hv_car_details')->result_array();
	}
	
	public function get_active_country($name)
	{
		$this->db->select('si_countries.*');
		$this->db->from('si_countries');
		$this->db->join('si_countries_details', 'si_countries_details.country_detail_id = si_countries.country_id', 'left');
		$this->db->where('si_countries.country_name', $name);
		return $this->db->get()->row_array();
	}

	public function get_images($id)
	{
		$this->db->select('*');
		$this->db->from('hv_car_images');
		$this->db->where('car_d_id ', $id);
		$this->db->order_by("s_no", "asc");
		return $this->db->get()->result_array();
	}

	public function get_selected_cars_result($column, $value)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		$this->db->where('hv_car_details.' . $column, $value);

		return $this->db->get()->result_array();
	}


	public function get_all_cars_by_tag($value)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.ManufactureYear, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_details.car_tag', $value);
		$this->db->where('hv_car_details.horizon_id ', 1);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		$this->db->order_by("hv_car_details.car_d_id", "DESC");

		return $this->db->get()->result_array();
	}


	public function by_discount($price1, $price2)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		if ($price1 == true) {
			$this->db->where('hv_car_details.cardisprice >=', $price1);
		}
		if ($price2 == true) {
			$this->db->where('hv_car_details.cardisprice <=', $price2);
		}

		return $this->db->get()->result_array();
	}

	public function under($price1)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_details.carprice <=', $price1);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->result_array();
	}

	public function over($price1)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_details.carprice >=', $price1);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->result_array();
	}

	public function select_where($table, $where)
	{
		return $this->db->get_where($table, $where)->result_array();
	}
	public function get_row($table, $where)
	{
		return $this->db->get_where($table, $where)->row_array();
	}

	public function get_all_car_image()
	{
		$sql = "SELECT hv_car_images.stored_file_name,hv_car_details.car_d_id FROM `hv_car_images` 
		        JOIN `hv_car_details` ON `hv_car_details`.car_d_id = `hv_car_images`.car_d_id
		        WHERE `hv_car_images`.s_no = 0 AND `hv_car_details`.is_trash = 0
				GROUP BY hv_car_images.id
				ORDER BY hv_car_images.id DESC 
				LIMIT 10";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_country_name()
	{

		$sql = "SELECT * FROM `si_countries` 
		        JOIN `hv_car_details` ON `hv_car_details`.`country_id` = `si_countries`.`country_id` 
		        WHERE `hv_car_details`.is_trash = 0
		        GROUP BY si_countries.country_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}



	public function get_active_by_category_cars($name)
	{
		$this->db->select('hv_car_manufacturer.*');
		$this->db->from('hv_car_manufacturer');
		$this->db->join('hv_car_details', 'hv_car_details.vm_id = hv_car_manufacturer.vm_id');
		$this->db->where('hv_car_manufacturer.vm_name', $name);
		$this->db->where('hv_car_manufacturer.active ', 1);
		return $this->db->get()->row_array();
	}

	public function get_active_by_bodytype_cars($name)
	{
		$string = $name;
		$car_body_type = str_replace("-", " ", $string);

		$this->db->select('hv_car_bodytype.*');
		$this->db->from('hv_car_bodytype');
		$this->db->join('hv_car_details', 'hv_car_details.Bodytype = hv_car_bodytype.bodytype_id', 'left');
		$this->db->where('hv_car_bodytype.bodytype_name', $car_body_type);
		$this->db->where('hv_car_bodytype.active', 1);


		return $this->db->get()->row_array();
	}

	

	public function get_by_bodytype_cars($value)
	{
		$this->db->select('hv_car_bodytype_details.*, hv_car_details.*, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_bodytype_details');
		$this->db->join('hv_car_details', 'hv_car_details.car_d_id = hv_car_bodytype_details.car_d_id', 'left');
		$this->db->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_bodytype_details.bodytype_id', $value);
		$this->db->where('hv_car_bodytype.active', 1);
		$this->db->where('hv_car_manufacturer.active', 1);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->result_array();
	}

	public function get_model_seo_details($module)
	{
		$this->db->select('hv_car_models.*');
		$this->db->from('hv_car_models');
		$this->db->join('hv_car_details', 'hv_car_details.m_id = hv_car_models.m_id');
		$this->db->where('hv_car_models.m_id', $module);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->row_array();
	}

	public function get_active_by_model_cars($name)
	{
		$string = $name;
		$car_model = str_replace("-", " ", $string);

		$this->db->select('hv_car_models.*,hv_car_manufacturer.vm_id');
		$this->db->from('hv_car_models');
		$this->db->join('hv_car_details', 'hv_car_details.m_id = hv_car_models.m_id');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_models.vm_id');
		$this->db->where('hv_car_models.model_name', $car_model);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->row_array();
	}

	public function get_by_model_cars($value)
	{
		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		$this->db->where('hv_car_details.m_id', $value);

		return $this->db->get()->result_array();
	}


    public function get_car_detail($id)
	{
		$this->db->select('hv_car_details.*,hv_car_bodytype_details.bodytype_id,hv_car_bodytype.bodytype_name, hv_car_manufacturer.vm_name, hv_car_models.model_name,images.stored_file_name,images.file_path');
		$this->db->from('hv_car_details');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_home_page_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.featured_iamge = 1', 'left');
		$this->db->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left');
		$this->db->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left');
		$this->db->where('hv_car_details.car_d_id', $id);
		$this->db->where('hv_car_manufacturer.active ', 1);
		$this->db->where('hv_car_models.active ', 1);
		return $this->db->get()->row_array();
	}

	public function filter($arr = array())
	{
		$clearance_sale = (!empty($arr['clearance_sale']) || $arr['clearance_sale'] == 0) ? $arr['clearance_sale'] : '';
		$make_id = !empty($arr['make_id']) ? $arr['make_id'] : '';
		$module = !empty($arr['module']) ? $arr['module'] : '';
		$fuel = !empty($arr['fuel']) ? $arr['fuel'] : '';
		$price_from = !empty($arr['price_from']) ? $arr['price_from'] : '';
		$price_to = !empty($arr['price_to']) ? $arr['price_to'] : '';
		$body_type = !empty($arr['body_type']) ? $arr['body_type'] : '';
		$steering = !empty($arr['steering']) ? $arr['steering'] : '';
		$transmission = !empty($arr['transmission']) ? $arr['transmission'] : '';
		$mileage_to = !empty($arr['mileage_to']) ? $arr['mileage_to'] : '';
		$engine_capacity_from = !empty($arr['engine_capacity_from']) ? $arr['engine_capacity_from'] : '';
		$year_from = !empty($arr['year_from']) ? $arr['year_from'] : '';
		$month_from = !empty($arr['month_from']) ? $arr['month_from'] : '';
		$year_to = !empty($arr['year_to']) ? $arr['year_to'] : '';
		$month_to = !empty($arr['month_to']) ? $arr['month_to'] : '';
		$sort = !empty($arr['sort']) ? $arr['sort'] : '';
		$by = !empty($arr['by']) ? $arr['by'] : '';
		$discounted = !empty($arr['discounted']) ? $arr['discounted'] : '';
		$refrence_no = !empty($arr['refrence_no']) ? $arr['refrence_no'] : '';
		$car_tag = !empty($arr['car_tag']) ? $arr['car_tag'] : '';
		$country_id = !empty($arr['country_id']) ? $arr['country_id'] : '';
		$wheel_type = !empty($arr['wheel_type']) ? $arr['wheel_type'] : '';

		$this->db->select('hv_car_details.car_d_id, hv_car_details.VehicleNo, hv_car_details.ManufactureYear, hv_car_details.RegistrationYear, hv_car_details.carprice, hv_car_details.Mileage, hv_car_details.EngineSize, hv_car_details.Transmission, hv_car_manufacturer.vm_name, hv_car_models.model_name, hv_car_bodytype_details.*,images.stored_file_name,images.file_path');
		$this->db->join('hv_car_manufacturer', 'hv_car_manufacturer.vm_id = hv_car_details.vm_id', 'left');
		$this->db->join('hv_car_models', 'hv_car_models.m_id = hv_car_details.m_id', 'left');
		$this->db->join('hv_car_bodytype_details', 'hv_car_bodytype_details.car_d_id = hv_car_details.car_d_id', 'left');
		$this->db->join('hv_car_bodytype', 'hv_car_bodytype.bodytype_id = hv_car_bodytype_details.bodytype_id', 'left');
		$this->db->join('hv_car_images images', 'images.car_d_id = hv_car_details.car_d_id AND images.s_no = 0', 'left');
		$this->db->join('si_countries_details', 'si_countries_details.car_d_id = hv_car_details.car_d_id', 'left');
		$this->db->join('si_countries', 'si_countries.country_id = si_countries_details.country_detail_id', 'left');
		$this->db->where('hv_car_manufacturer.active', 1);
		$this->db->where('hv_car_models.active', 1);
		$this->db->where('hv_car_bodytype.active', 1);
		$this->db->where('si_countries.active', 1);
		$this->db->where('hv_car_details.is_active', 1);
		$this->db->where('hv_car_details.is_trash', 0);
		if (!empty($clearance_sale)) {
			$this->db->where('hv_car_details.car_tag', $clearance_sale);
		}
		if (!empty($make_id)) {
			$this->db->where('hv_car_details.vm_id', $make_id);
		}
		if (!empty($module)) {
			$this->db->where('hv_car_details.m_id', $module);
		}
		if (!empty($fuel)) {
			$this->db->where('hv_car_details.Fuel', $fuel);
		}
		if (!empty($price_from)) {
			$this->db->where('hv_car_details.carprice >=', $price_from);
		}
		if (!empty($price_to)) {
			$this->db->where('hv_car_details.carprice <=', $price_to);
		}
		if (!empty($body_type)) {
			$this->db->where('hv_car_bodytype_details.bodytype_id', $body_type);
		}
		if (!empty($steering)) {
			$this->db->where('hv_car_details.Steering', $steering);
		}
		if (!empty($transmission)) {
			$this->db->where('hv_car_details.Transmission', $transmission);
		}
		if (!empty($mileage_from)) {
			$this->db->where('hv_car_details.Mileage >=', $mileage_from);
		}
		if (!empty($mileage_to)) {
			$this->db->where('hv_car_details.Mileage <=', $mileage_to);
		}
		if (!empty($country_id)) {
			$this->db->join('(
				SELECT car_d_id,country_detail_id
				FROM si_countries_details
				GROUP BY car_d_id 
			) as si_countries_details_2', 'si_countries_details_2.car_d_id = hv_car_details.car_d_id');
			$this->db->where('si_countries_details_2.country_detail_id', $country_id);
		}
		if (!empty($engine_capacity_from)) {
			$this->db->where('hv_car_details.EngineSize', $engine_capacity_from);
		}
		if (!empty($year_from)) {
			$this->db->where('hv_car_details.RegistrationYear >=', $year_from);
		}
		if (!empty($month_from)) {
			$this->db->where('hv_car_details.RegistrationMonth >=', $month_from);
		}
		if (!empty($year_to)) {
			$this->db->where('hv_car_details.RegistrationYear <=', $year_to);
		}
		if (!empty($month_to)) {
			$this->db->where('hv_car_details.RegistrationMonth <=', $month_to);
		}
		if (!empty($discounted)) {
			$this->db->where('hv_car_details.car_tag', $discounted);
		}
		if (!empty($refrence_no)) {
			$this->db->where('hv_car_details.VehicleNo', $refrence_no);
		}
		if (!empty($car_tag)) {
			$this->db->where('hv_car_details.car_tag', $car_tag);
		}
		if (!empty($wheel_type)) {
			$this->db->where('hv_car_details.WheelDrive', $wheel_type);
		}
		if (!empty($sort)) {
			if ($sort == "mileage_desc") {
				$this->db->order_by('hv_car_details.Mileage', 'DESC');
			}
			if ($sort == "price_asc") {
				$this->db->order_by('hv_car_details.carprice', 'ASC');
			}
			if ($sort == "year_asc") {
				$this->db->order_by('hv_car_details.RegistrationMonth', 'ASC');
			}
			if ($sort == "mileage_asc") {
				$this->db->order_by('hv_car_details.Mileage', 'ASC');
			}
			if ($sort == "year_desc") {
				$this->db->order_by('hv_car_details.RegistrationMonth', 'DESC');
			}
			if ($sort == "price_desc") {
				$this->db->order_by('hv_car_details.carprice', 'DESC');
			}
		} else {
			$this->db->order_by('hv_car_details.car_d_id', 'DESC');
		}
		$result =  $this->db->group_by('hv_car_details.car_d_id')->get('hv_car_details')->result_array();
// 		echo $this->db->last_query();die;
		return $result;
	}
}
