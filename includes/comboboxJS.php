<script type="text/javascript">
	function cmbSubCombo(mcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/subComboController.php', {action: 'cmbSubCombo', mcmb_id: mcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.scmb_id)) {
							cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbRelateCombo(mcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/subComboController.php', {action: 'cmbRelateCombo', mcmb_id: mcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.rlcmb_id)) {
							cmbdata += '<option value="' + qdt.rlcmb_id + '" selected>' + qdt.rlcmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.rlcmb_id + '">' + qdt.rlcmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbRelateSubCombo(mcmb_id, rlcmb_id, className, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/subComboController.php', {action: 'cmbRelateSubCombo', mcmb_id: mcmb_id, rlcmb_id: rlcmb_id}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Data not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.scmb_id)) {
							cmbdata += '<option value="' + qdt.scmb_id + '" selected>' + qdt.scmb_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.scmb_id + '">' + qdt.scmb_name + '</option>';
					}
				});
			}
			$(className).html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	//Load Combo Box Functions
		function cmbZonal(zol_province, selected, callback) {
		var cmbdata = "";
		$.post('controllers/zonalController.php', {action: 'cmbZonal', zol_province: zol_province}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Zonal not available! </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.zol_id)) {
							cmbdata += '<option value="' + qdt.zol_id + '" selected>' + qdt.zol_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.zol_id + '">' + qdt.zol_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.zol_id + '">' + qdt.prov_name + '</option>';
					}
				});
			}
			$('.cmbZonal').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbDistrict(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/districtController.php', {action: 'cmbDistrict'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> District not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.dtr_id)) {
							cmbdata += '<option value="' + qdt.dtr_id + '" selected>' + qdt.dtr_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.dtr_id + '">' + qdt.dtr_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.dtr_id + '">' + qdt.dtr_name + '</option>';
					}
				});
			}
			$('.cmbDistrict').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbDSOffice(dsof_district, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/dsofficeController.php', {action: 'cmbDSOffice', dsof_district: dsof_district}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> District not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.dsof_id)) {
							cmbdata += '<option value="' + qdt.dsof_id + '" selected>' + qdt.dsof_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.dsof_id + '">' + qdt.dsof_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.dsof_id + '">' + qdt.dsof_name + '</option>';
					}
				});
			}
			$('.cmbDSOffice').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbGNDivision(gnd_dsoffice, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/gndivisionController.php', {action: 'cmbGNDivision', gnd_dsoffice: gnd_dsoffice}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> GN Divisions not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.gnd_id)) {
							cmbdata += '<option value="' + qdt.gnd_id + '" selected>' + qdt.gnd_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.gnd_id + '">' + qdt.gnd_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.gnd_id + '">' + qdt.gnd_name + '</option>';
					}
				});
			}
			$('.cmbGNDivision').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbDivision(div_zone, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/divisionController.php', {action: 'cmbDivision', div_zone: div_zone}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Divisions not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.div_id)) {
							cmbdata += '<option value="' + qdt.div_id + '" selected>' + qdt.div_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.div_id + '">' + qdt.div_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.div_id + '">' + qdt.div_name + '</option>';
					}
				});
			}
			$('.cmbDivision').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbBranch(br_zone, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/branchController.php', {action: 'cmbBranch', br_zone: br_zone}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Divisions not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.br_id)) {
							cmbdata += '<option value="' + qdt.br_id + '" selected>' + qdt.br_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.br_id + '">' + qdt.br_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.br_id + '">' + qdt.br_name + '</option>';
					}
				});
			}
			$('.cmbBranch').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}


	function cmbInstitute(inst_division, inst_institutetype, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbInstitute', inst_division: inst_division, inst_institutetype: inst_institutetype}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Institutes not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.inst_id)) {
							cmbdata += '<option value="' + qdt.inst_id + '" selected>' + qdt.inst_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
					}
				});
			}
			$('.cmbInstitute').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}
	
	function cmbInstituteWithoutType(inst_division,selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbInstituteWithoutType', inst_division: inst_division}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Institutes not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.inst_id)) {
							cmbdata += '<option value="' + qdt.inst_id + '" selected>' + qdt.inst_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
					}
				});
			}
			$('.cmbInstituteWithoutType').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}
	
	function cmbProvince(selected, callback) {
		var cmbdata = "";
		$.post('controllers/provinceController.php', {action: 'cmbProvince'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Province not available! </option>';
			} else {
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.prov_id)) {
							cmbdata += '<option value="' + qdt.prov_id + '" selected>' + qdt.prov_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.prov_id + '">' + qdt.prov_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.prov_id + '">' + qdt.prov_name + '</option>';
					}
				});
			}
			$('.cmbProvince').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback();
				}
			}
		}, "json");
	}

	function cmbInstituteExceptLoggedOne(inst_division, inst_institutetype, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbInstituteExceptLoggedOne', inst_division: inst_division, inst_institutetype: inst_institutetype}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Institutes not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.inst_id)) {
							cmbdata += '<option value="' + qdt.inst_id + '" selected>' + qdt.inst_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.inst_id + '">' + qdt.inst_name + '</option>';
					}
				});
			}
			$('.cmbInstitute').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}


	function cmbUserCategory(usrcat_institute, selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/userCategoryController.php', {action: 'cmbUserCategory', usrcat_institute: usrcat_institute}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> User category not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.usrcat_id)) {
							cmbdata += '<option value="' + qdt.usrcat_id + '" selected>' + qdt.usrcat_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.usrcat_id + '">' + qdt.usrcat_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.usrcat_id + '">' + qdt.usrcat_name + '</option>';
					}
				});
			}
			$('.cmbUserCategory').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

//new req school options
	function cmbSchoolType(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbSchoolType'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> School Type not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.schtype_id)) {
							cmbdata += '<option value="' + qdt.schtype_id + '" selected>' + qdt.schtype_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.schtype_id + '">' + qdt.schtype_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.schtype_id + '">' + qdt.schtype_name + '</option>';
					}
				});
			}
			$('.cmbSchoolType').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbSchoolOwnership(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbSchoolOwnership'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> School Ownership not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.schowsh_id)) {
							cmbdata += '<option value="' + qdt.schowsh_id + '" selected>' + qdt.schowsh_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.schowsh_id + '">' + qdt.schowsh_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.schowsh_id + '">' + qdt.schowsh_name + '</option>';
					}
				});
			}
			$('.cmbSchoolOwnership').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbSchoolMedium(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbSchoolMedium'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> School Medium not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.schmd_id)) {
							cmbdata += '<option value="' + qdt.schmd_id + '" selected>' + qdt.schmd_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.schmd_id + '">' + qdt.schmd_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.schmd_id + '">' + qdt.schmd_name + '</option>';
					}
				});
			}
			$('.cmbSchoolMedium').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbSchoolClassification(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbSchoolClassification'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> School Classification not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.schcl_id)) {
							cmbdata += '<option value="' + qdt.schcl_id + '" selected>' + qdt.schcl_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.schcl_id + '">' + qdt.schcl_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.schcl_id + '">' + qdt.schcl_name + '</option>';
					}
				});
			}
			$('.cmbSchoolClassification').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

	function cmbSchoolGrade(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbSchoolGrade'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> School Classification not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.schgrd_id)) {
							cmbdata += '<option value="' + qdt.schgrd_id + '" selected>' + qdt.schgrd_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.schgrd_id + '">' + qdt.schgrd_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.schgrd_id + '">' + qdt.schgrd_name + '</option>';
					}
				});
			}
			$('.cmbSchoolGrade').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}
	//end of school options
	
	function cmbInstituteType(selected, callback) {
		var cmbdata = "";
		var dataAvailable = 0;
		$.post('controllers/instituteController.php', {action: 'cmbInstituteType'}, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				cmbdata += '<option value="0"> Institute types not available! </option>';
			} else {
				dataAvailable = 1;
				$.each(e, function (index, qdt) {
					if (selected !== undefined || selected !== null || parseInt(selected) > 0) {
						if (parseInt(selected) === parseInt(qdt.insttype_id)) {
							cmbdata += '<option value="' + qdt.insttype_id + '-' + qdt.insttype_nature + '" selected>' + qdt.insttype_name + '</option>';
						} else {
							cmbdata += '<option value="' + qdt.insttype_id + '-' + qdt.insttype_nature + '">' + qdt.insttype_name + '</option>';
						}
					} else {
						cmbdata += '<option value="' + qdt.insttype_id + '-' + qdt.insttype_nature + '">' + qdt.insttype_name + '</option>';
					}
				});
			}
			$('.cmbInstituteType').html('').append(cmbdata);
			chosenRefresh();

			if (callback !== undefined) {
				if (typeof callback === 'function') {
					callback(dataAvailable);
				}
			}
		}, "json");
	}

</script>

