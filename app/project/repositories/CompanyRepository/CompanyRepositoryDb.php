<?php 

namespace project\repositories\CompanyRepository;
use Company;
 
class CompanyRepositoryDb implements CompanyRepositoryInterface {

	public function getById($id){
		return Company::find($id)->first();
	}
}
