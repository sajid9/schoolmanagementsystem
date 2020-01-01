<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@myHome');
Route::get('/profile/{id}','HomeController@myProfile')->name("view_profile");
	//registration routes

Route::get('/registrationform','HomeController@regform');

Route::get('/student-list','HomeController@viewlist');

Route::get('/registeredStd','HomeController@candidate_list');

Route::post('/regStudents','HomeController@add_registration');


Route::post('/candidateDetails','HomeController@add_previous');
Route::get('editRegistration/{id}','HomeController@edit_registration');
Route::post('updateRegistration','HomeController@update_registration');
Route::get('delRegistration/{id}','HomeController@del_registration');

		//admission routes
Route::get('/admissionform','AdmissionsController@create');
Route::post('/admitStudents','AdmissionsController@store');
Route::get('/admittedStd','AdmissionsController@index');
Route::get('editAdmission/{id}','AdmissionsController@edit');
Route::post('/updateAdmission','AdmissionsController@update');
Route::get('/studentProfile/{id}','AdmissionsController@show')->name("student_profile");



Route::post('/fetch','AdmissionsController@fetchfatername');

Route::get('delAdmission/{id}','AdmissionsController@destroy');



	// classes routes
Route::get('/classes','ClassesController@create');
Route::get('classes-list','ClassesController@index');
Route::post('/addClasses','ClassesController@store');
Route::get('/editClasses/{id}','ClassesController@edit');
Route::post('updateClasses','ClassesController@update');
Route::get('delClasses/{id}','ClassesController@destroy');

		// category routes

Route::get('/categories','CategoriesController@create');
Route::post('/addCategories','CategoriesController@store');
Route::get('categories-list','CategoriesController@index');
Route::get('/editCategories/{id}','CategoriesController@edit');
Route::post('updateCategories','CategoriesController@update');
Route::get('delCategories/{id}','CategoriesController@destroy');
		
		// sessions routes

Route::get('/sessions','SessionsController@create');
Route::post('/addSessions','SessionsController@store');
Route::get('sessions-list','SessionsController@index');
Route::get('/editSessions/{id}','SessionsController@edit');
Route::post('updateSessions','SessionsController@update');
Route::get('delSessions/{id}','SessionsController@destroy');

		// sections routes

Route::get('/sections','SectionsController@create');
Route::post('/addSections','SectionsController@store');
Route::get('sections-list','SectionsController@index');
Route::get('/editSections/{id}','SectionsController@edit');
Route::post('updateSections','SectionsController@update');
Route::get('delSections/{id}','SectionsController@destroy');
	
	// Years routes
Route::get('/years','YearsController@create');
Route::get('years-list','YearsController@index');
Route::post('/addYears','YearsController@store');
Route::get('/editYears/{id}','YearsController@edit');
Route::post('updateYears','YearsController@update');
Route::get('delYears/{id}','YearsController@destroy');

//employes routes
Route::get('/employees','EmployeesController@create');
Route::get('employees-list','EmployeesController@index');
Route::post('/addEmployees','EmployeesController@store');
Route::get('/editEmployees/{id}','EmployeesController@edit');
Route::post('updateEmployees','EmployeesController@update');
Route::get('delEmployees/{id}','EmployeesController@destroy');

//batches
Route::get('/batches','BatchesController@create');
Route::get('batches-list','BatchesController@index');
Route::post('/addBatches','BatchesController@store');
Route::get('editBatches/{id}','BatchesController@edit');
Route::post('updateBatches','BatchesController@update');
Route::get('delBatches/{id}','BatchesController@destroy');

//classEnrollments
Route::get('/cEnrollments','cEnrollmentsController@create');
Route::get('cEnrollments-list','cEnrollmentsController@index');
Route::post('/addCEnrollments','cEnrollmentsController@store');
Route::get('editcEnrollment/{id}','cEnrollmentsController@edit');
Route::post('updatecEnrollment','cEnrollmentsController@update');
Route::get('delcEnrollment/{id}','cEnrollmentsController@destroy');
Route::post('search-class-students','cEnrollmentsController@search_class_students');
//addCEnrollments

		// subjects routes

Route::get('/subjects','SubjectsController@create');
Route::post('/addSubjects','SubjectsController@store');
Route::get('subjects-list','SubjectsController@index');
Route::get('/editSubjects/{id}','SubjectsController@edit');
Route::post('updateSubjects','SubjectsController@update');
Route::get('delSubjects/{id}','SubjectsController@destroy');

		// days routes

Route::get('/days','DaysController@create');
Route::post('/addDays','DaysController@store');
Route::get('days-list','DaysController@index');
Route::get('/editDays/{id}','DaysController@edit');
Route::post('updateDays','DaysController@update');
Route::get('delDays/{id}','DaysController@destroy');

		// months routes

Route::get('/months','MonthsController@create');
Route::post('/addMonth','MonthsController@store');
Route::get('months-list','MonthsController@index');
Route::get('/editMonths/{id}','MonthsController@edit');
Route::post('updateMonth','MonthsController@update');
Route::get('delMonths/{id}','MonthsController@destroy');

		// time routes

Route::get('/time','TimeController@create');
Route::post('/addTime','TimeController@store');
Route::get('time-list','TimeController@index');
Route::get('/editTime/{id}','TimeController@edit');
Route::post('updateTime','TimeController@update');
Route::get('delTime/{id}','TimeController@destroy');
		
		// ClassRoom routes

Route::get('/classRooms','ClassRoomsController@create');
Route::post('/addClassRoom','ClassRoomsController@store');
Route::get('classRooms-list','ClassRoomsController@index');
Route::get('/editClassRooms/{id}','ClassRoomsController@edit');
Route::post('updateClassRooms','ClassRoomsController@update');
Route::get('delClassRoom/{id}','ClassRoomsController@destroy');

//periods routes
Route::get('/periods','PeriodsController@create');
Route::get('periods-list','PeriodsController@index');
Route::post('/addPeriods','PeriodsController@store');
Route::get('editPeriods/{id}','PeriodsController@edit');
Route::post('updatePeriods','PeriodsController@update');
Route::get('delPeriods/{id}','PeriodsController@destroy');

//TimeTable routes
Route::get('/timeTables','TimeTablesController@create');
Route::get('timeTable-list','TimeTablesController@index')->name('timeTable-list');
Route::post('/addTimeTable','TimeTablesController@store');
Route::get('editTimeTable/{id}','TimeTablesController@edit');
Route::post('updateTimeTable','TimeTablesController@update');
Route::get('delTimeTable/{id}','TimeTablesController@destroy');
Route::get('attendence/{id}/{period_id}','TimeTablesController@attendence')->name('attendence');

		// ExamTime routes

Route::get('/examTime','ExamTimeController@create');
Route::post('/addExamTime','ExamTimeController@store');
Route::get('examTime-list','ExamTimeController@index');
Route::get('/editExamTime/{id}','ExamTimeController@edit');
Route::post('updateExamTime','ExamTimeController@update');
Route::get('delExamTime/{id}','ExamTimeController@destroy');
		
				// ExamTerm routes

Route::get('/examTerm','ExamTermController@create');
Route::post('/addExamTerm','ExamTermController@store');
Route::get('examTerm-list','ExamTermController@index');
Route::get('/editExamTerm/{id}','ExamTermController@edit');
Route::post('updateExamTerm','ExamTermController@update');
Route::get('delExamTerm/{id}','ExamTermController@destroy');
		
				// ExamSlot routes

Route::get('/examSlot','ExamSlotController@create');
Route::post('/addExamSlot','ExamSlotController@store');
Route::get('examSlot-list','ExamSlotController@index');
Route::get('/editExamSlot/{id}','ExamSlotController@edit');
Route::post('updateExamSlot','ExamSlotController@update');
Route::get('delExamSlot/{id}','ExamSlotController@destroy');

			// ExamSchedule routes

Route::get('/examSchedule','ExamScheduleController@create');
Route::post('/addExamSchedule','ExamScheduleController@store');
Route::get('examSchedule-list','ExamScheduleController@index');
Route::get('/editExamSchedule/{id}','ExamScheduleController@edit');
Route::post('updateExamSchedule','ExamScheduleController@update');
Route::get('delExamSchedule/{id}','ExamScheduleController@destroy');
Route::get('examattendence/{scheduleId}/{batchId}','ExamScheduleController@axam_attendence_list');
Route::post('markexamAttendence','ExamScheduleController@mark_exam_attendence');
Route::get('examination-attendence','ExamScheduleController@examination_attendence');
		//exam attendance
Route::post('searchexamattendance','ExamScheduleController@search_exam_attendance');
		// grades routes

Route::get('/grades','GradesController@create');
Route::post('/addGrade','GradesController@store');
Route::get('grades-list','GradesController@index');
Route::get('/editGrades/{id}','GradesController@edit');
Route::post('updateGrades','GradesController@update');
Route::get('delGrades/{id}','GradesController@destroy');

		// results routes

Route::get('/results','ResultsController@create');
Route::post('/addResults','ResultsController@store');
Route::get('results-list','ResultsController@index');
Route::get('/editResults/{id}','ResultsController@edit');
Route::post('updateResults','ResultsController@update');
Route::get('delResults/{id}','ResultsController@destroy');
		
		// salaryChargTypes routes

Route::get('/salaryChargTypes','SalaryChargTypeController@create');
Route::post('/addSalaryChargType','SalaryChargTypeController@store');
Route::get('salaryChargTypes-list','SalaryChargTypeController@index');
Route::get('/editSalaryChargType/{id}','SalaryChargTypeController@edit');
Route::post('updateSalaryChargType','SalaryChargTypeController@update');
Route::get('delSalaryChargType/{id}','SalaryChargTypeController@destroy');

		
		// salaryChargCategory routes

Route::get('/salaryChargCategory','SalaryChargCategoryController@create');
Route::post('/addSalaryChargCategory','SalaryChargCategoryController@store');
Route::get('salaryChargCategory-list','SalaryChargCategoryController@index');
Route::get('/editSalaryChargCategory/{id}','SalaryChargCategoryController@edit');
Route::post('updateSalaryChargCategory','SalaryChargCategoryController@update');
Route::get('delSalaryChargCategory/{id}','SalaryChargCategoryController@destroy');

		
		// salaryChargHead routes

Route::get('/salaryChargHead','SalaryChargHeadController@create');
Route::post('/addSalaryChargHead','SalaryChargHeadController@store');
Route::get('salaryChargHead-list','SalaryChargHeadController@index');
Route::get('/editSalaryChargHead/{id}','SalaryChargHeadController@edit');
Route::post('updateSalaryChargHead','SalaryChargHeadController@update');
Route::get('delSalaryChargHead/{id}','SalaryChargHeadController@destroy');
		
		// employeeGrade routes

Route::get('/employeeGrade','EmployeeGradeController@create');
Route::post('/addEmployeeGrade','EmployeeGradeController@store');
Route::get('employeeGrade-list','EmployeeGradeController@index');
Route::get('/editEmployeeGrade/{id}','EmployeeGradeController@edit');
Route::post('updateEmployeeGrade','EmployeeGradeController@update');
Route::get('delEmployeeGrade/{id}','EmployeeGradeController@destroy');

		
		// salaryCharges routes

Route::get('/salaryCharges','SalaryChargesController@create');
Route::post('/addSalaryCharges','SalaryChargesController@store');
Route::get('salaryCharges-list','SalaryChargesController@index');
Route::get('/editSalaryCharges/{id}','SalaryChargesController@edit');
Route::post('updateSalaryCharges','SalaryChargesController@update');
Route::get('delSalaryCharges/{id}','SalaryChargesController@destroy');



 
		
		// employeeTotalSalary routes

Route::get('/employeeTotalSalary','EmployeeTotalSalaryController@create');
Route::post('/addEmployeeTotalSalary','EmployeeTotalSalaryController@store');
Route::get('employeeTotalSalary-list','EmployeeTotalSalaryController@index');
Route::get('/editEmployeeTotalSalary/{id}','EmployeeTotalSalaryController@edit');
Route::post('updateEmployeeTotalSalary','EmployeeTotalSalaryController@update');
Route::get('delEmployeeTotalSalary/{id}','EmployeeTotalSalaryController@destroy');
 		
 		// employeeSalary routes

Route::get('/employeeSalary','EmployeeSalaryController@create');
Route::post('/addEmployeeSalary','EmployeeSalaryController@store');
Route::get('employeeSalary-list','EmployeeSalaryController@index');
Route::get('/editEmployeeSalary/{id}','EmployeeSalaryController@edit');
Route::post('updateEmployeeSalary','EmployeeSalaryController@update');
Route::get('delEmployeeSalary/{id}','EmployeeSalaryController@destroy');

Route::post('/salaryHeadAmount','EmployeeSalaryController@headAmount');
 
 		// feeChargTypes routes

Route::get('/feeChargTypes','FeeChargTypeController@create');
Route::post('/addFeeChargType','FeeChargTypeController@store');
Route::get('feeChargTypes-list','FeeChargTypeController@index');
Route::get('/editFeeChargType/{id}','FeeChargTypeController@edit');
Route::post('updateFeeChargType','FeeChargTypeController@update');
Route::get('delFeeChargType/{id}','FeeChargTypeController@destroy');
		
		// feeChargCategory routes

Route::get('/feeChargCategory','FeeChargCategoryController@create');
Route::post('/addFeeChargCategory','FeeChargCategoryController@store');
Route::get('feeChargCategory-list','FeeChargCategoryController@index');
Route::get('/editFeeChargCategory/{id}','FeeChargCategoryController@edit');
Route::post('updateFeeChargCategory','FeeChargCategoryController@update');
Route::get('delFeeChargCategory/{id}','FeeChargCategoryController@destroy');
		
		// feeChargHead routes

Route::get('/feeChargHead','FeeChargHeadController@create');
Route::post('/addFeeChargHead','FeeChargHeadController@store');
Route::get('feeChargHead-list','FeeChargHeadController@index');
Route::get('/editFeeChargHead/{id}','FeeChargHeadController@edit');
Route::post('updateFeeChargHead','FeeChargHeadController@update');
Route::get('delFeeChargHead/{id}','FeeChargHeadController@destroy');
		
		
		// feeCharges routes

Route::get('/feeCharges','FeeChargesController@create');
Route::post('/addFeeCharges','FeeChargesController@store');
Route::get('feeCharges-list','FeeChargesController@index');
Route::get('/editFeeCharges/{id}','FeeChargesController@edit');
Route::post('updateFeeCharges','FeeChargesController@update');
Route::get('delFeeCharges/{id}','FeeChargesController@destroy');
 
		
		// studentTotalFee routes

Route::get('/studentTotalFee','StudentTotalFeeController@create');
Route::post('/addStudentTotalFee','StudentTotalFeeController@store');
Route::get('studentTotalFee-list','StudentTotalFeeController@index');
Route::get('/editStudentTotalFee/{id}','StudentTotalFeeController@edit');
Route::post('updateStudentTotalFee','StudentTotalFeeController@update');
Route::get('delStudentTotalFee/{id}','StudentTotalFeeController@destroy');

 		// studentFee routes

Route::get('/studentFee','StudentFeeController@create');
Route::post('/addStudentFee','StudentFeeController@store');
Route::get('studentFee-list','StudentFeeController@index');
Route::get('/editStudentFee/{id}','StudentFeeController@edit');
Route::post('updateStudentFee','StudentFeeController@update');
Route::get('delStudentFee/{id}','StudentFeeController@destroy');

Route::post('/feeHeadAmount','StudentFeeController@headAmount');

 

/*
***sajid code start from there***
*/

Route::get('admissionreport','AdmissionsController@admission_report');	
Route::get('attendence/{id}','TimeTablesController@attendence')->name('attendence');	
Route::get('timeTableReport','Reports\TimetableController@timetable_report');	
Route::post('timetablesearch','Reports\TimetableController@timetable_search');	
Route::get('attendanceReport','Reports\AttendanceController@attendance_report');	
Route::post('attendancesearch','Reports\AttendanceController@attendance_search');
Route::post('markAttendence','AttendenceController@markattendence');	
Route::get('student-result','ResultsController@student_result');	
Route::post('result-search','ResultsController@result_search');	
Route::get('result-summary','ResultsController@result_summary');	
Route::post('search-result-summary','ResultsController@search_result_summary');	
/*
*
*Payments
*
*/
Route::prefix('payment')->middleware(['auth'])->group(function(){
    Route::get('paymentlisting','payments\payment@paymentlisting');
    Route::get('addpaymentform','payments\payment@addpaymentform');
    Route::post('addpayment','payments\payment@addpayment');
    Route::post('addpaymentsale','payments\payment@addpaymentsale');
    Route::get('addsopayment/{receiptId}/{totalAmount}/{customerId}','payments\payment@addsopayment');
    Route::get('financialyear','payments\payment@financialyear');
    Route::get('addfinancialyear','payments\payment@addfinancialyear');
    Route::post('addfnyear','payments\payment@add_fnyear');
    Route::get('deleteyear/{id}','payments\payment@delete_year');
    Route::post('checkamount','payments\payment@check_paid_amount');
    Route::post('getaccountinfo','payments\payment@get_account_info');
});
Route::prefix('account')->middleware(['auth'])->group(function(){
	Route::get('accounts','Account\AccountController@opening_account');
    Route::post('saveaccount','Account\AccountController@save_account');
    Route::get('accountlisting','Account\AccountController@account_listing');
});
/*
*
*expenditure
*
*/
Route::prefix('expenditure')->middleware(['auth'])->group(function(){
    Route::get('headlisting','expenditure\expenditure@headlisting');
    Route::get('addhead','expenditure\expenditure@addhead');
    Route::post('savehead','expenditure\expenditure@savehead');
    Route::get('edithead/{id}','expenditure\expenditure@edithead');
    Route::post('updatehead','expenditure\expenditure@updatehead');
    Route::get('subheadlisting/{id}','expenditure\expenditure@subheadlisting');
    Route::get('addsubhead/{id}','expenditure\expenditure@addsubhead');
    Route::post('savesubhead','expenditure\expenditure@savesubhead');
    Route::get('editsubhead/{id}','expenditure\expenditure@editsubhead');
    Route::post('updatesubhead','expenditure\expenditure@updatesubhead');
    Route::get('monthlisting','expenditure\expenditure@monthlisting');
    Route::get('addmonthform','expenditure\expenditure@addmonthform');
    Route::post('addmonth','expenditure\expenditure@addmonth');
    Route::get('editmonth/{id}','expenditure\expenditure@editmonth');
    Route::post('updatemonth','expenditure\expenditure@updatemonth');
    Route::post('getsubhead','expenditure\expenditure@getsubhead');
});
/*
*
*Applicants Routes
*
*/
/*
*/
Route::prefix('applicant')->middleware(['auth'])->group(function(){
Route::get('applicant','Applicant\Applicant@index')->name("applicant");
Route::get('addapplicant','Applicant\Applicant@addview')->name("addapplicant");
///crud opertion routes are here
Route::post('insertapplicant','Applicant\Applicant@insertapplicant')->name("insertapplicant");
Route::get('editapplicant/{id}','Applicant\Applicant@editview')->name("editapplicant");
Route::post('updateapplicant/{id}','Applicant\Applicant@updateapplicant')->name("updateapplicant");
Route::get('viewapplicant/{id}','Applicant\Applicant@viewapplicant')->name("viewapplicant");
Route::get('applicantdel/{id}','Applicant\Applicant@applicantdel')->name("applicantdel");
});
/*
*
*Shortlisting Routes
*
*/
/*
*/
Route::prefix('applicant')->middleware(['auth'])->group(function(){
	Route::get('shortlistingtable','Shortlisting\Shortlisting@shortlistingtable')->name("shortlistingtable");
	Route::get('shortlistingtableview/{id}','Shortlisting\Shortlisting@shortlistingtableview')->name("shortlistingtableview");
Route::get('shortlisting','Shortlisting\Shortlisting@index')->name("shortlisting");
Route::post('shortlistingfilter','Shortlisting\Shortlisting@shortlistingfilter')->name("shortlistingfilter");
Route::get('marktoshortlist/{id}','Shortlisting\Shortlisting@marktoshortlist')->name("marktoshortlist");
Route::get('unshortlist/{id}','Shortlisting\Shortlisting@unshortlist')->name("unshortlist");
Route::get('notshortlist/{id}','Shortlisting\Shortlisting@notshortlist')->name("notshortlist");
});
/*
*
* ALL Shortlisted  And Selection of Applicants Routes
*
*/
/*
*
*
*
*/
Route::prefix('applicant')->middleware(['auth'])->group(function(){
Route::get('allshortlisted','Allshortlisted\Allshortlisted@index')->name("allshortlisted");
Route::get('allshortlistedtable','Allshortlisted\Allshortlisted@allshortlistedtable')->name("allshortlistedtable");
Route::get('allshortlistedtableview/{id}','Allshortlisted\Allshortlisted@allshortlistedtableview')->name("allshortlistedtableview");
Route::get('marktoselected/{id}','Allshortlisted\Allshortlisted@marktoselected')->name("marktoselected");
Route::get('marktounselected/{id}','Allshortlisted\Allshortlisted@marktounselected')->name("marktounselected");
Route::post('allshortlistedfilter','Allshortlisted\Allshortlisted@allshortlistedfilter')->name("allshortlistedfilter");
Route::get('unshortlist/{id}','Allshortlisted\Allshortlisted@unshortlist')->name("unshortlist");
Route::get('notshortlist/{id}','Allshortlisted\Allshortlisted@notshortlist')->name("notshortlist");
});
/*
*
* Designation  Routes
*
*/
/*
*/
Route::prefix('applicant')->middleware(['auth'])->group(function(){
Route::get('applicantdesignation','ApplicantDesignation\ApplicantDesignation@index')->name("applicantdesignation");
Route::get('addapplicantdesignationview','ApplicantDesignation\ApplicantDesignation@addapplicantdesignationview')->name("addapplicantdesignationview");
Route::post('insertapplicantdesignation','ApplicantDesignation\ApplicantDesignation@insertapplicantdesignation')->name("insertapplicantdesignation");
Route::get('editapplicantdesignation/{id}','ApplicantDesignation\ApplicantDesignation@editapplicantdesignation')->name("editapplicantdesignation");
Route::post('updateapplicantdesignation','ApplicantDesignation\ApplicantDesignation@updateapplicantdesignation')->name("updateapplicantdesignation");
});
/*
*
* Contract and All Security Cleared   Routes
*
*/
/*
*
*
*
*/
Route::prefix('applicant')->middleware(['auth'])->group(function(){
Route::get('contracts','ApplicantContract\ApplicantContract@index')->name("contracts");
Route::post('insertcontract','ApplicantContract\ApplicantContract@insertcontracts')->name("insertcontracts");

Route::post('checkupdatecontract','ApplicantContract\ApplicantContract@checkupdatecontract')->name("checkupdatecontract");

Route::get('getsecuritycleared_ap','ApplicantContract\ApplicantContract@getsecuritycleared_ap')->name("getsecuritycleared_ap");

Route::post('updatecontract','ApplicantContract\ApplicantContract@updatecontract')->name("updatecontract");
Route::get('viewcontract/{id}','ApplicantContract\ApplicantContract@viewcontract')->name("viewcontract");

Route::get('joining','ApplicantContract\ApplicantContract@joining')->name("joining");
Route::post('updatecontractjoing','ApplicantContract\ApplicantContract@updatecontractjoing')->name("updatecontractjoing");
});
Auth::routes();


