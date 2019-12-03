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
Route::get('admissionreport','AdmissionsController@admission_report');


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

//employes
Route::get('/employees','EmployeesController@create');
Route::get('employees-list','EmployeesController@index');
Route::post('/addEmployees','EmployeesController@store');

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
Route::get('timeTable-list','TimeTablesController@index');
Route::post('/addTimeTable','TimeTablesController@store');
Route::get('editTimeTable/{id}','TimeTablesController@edit');
Route::post('updateTimeTable','TimeTablesController@update');
Route::get('delTimeTable/{id}','TimeTablesController@destroy');
Route::get('attendence/{id}','TimeTablesController@attendence')->name('attendence');
Route::get('timeTableReport','Reports\TimetableController@timetable_report');
Route::post('timetablesearch','Reports\TimetableController@timetable_search');
Route::get('attendanceReport','Reports\AttendanceController@attendance_report');
Route::post('attendancesearch','Reports\AttendanceController@attendance_search');
// Route::get('markattendence/{addmission_id}/{timeTable_id}','TimeTablesController@markattendence')->name('markattendence');
// Route::post('markAttendence','TimeTablesController@markattendence');

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
		
		// grades routes

Route::get('/grades','GradesController@create');
Route::post('/addGrades','GradesController@store');
Route::get('grades-list','GradesController@index');
Route::get('/editGrades/{id}','GradesController@edit');
Route::post('updateGrades','GradesController@update');
Route::get('delGrades/{id}','GradesController@destroy');


Route::post('markAttendence','AttendenceController@markattendence');
//Attendence routes
// Route::get('/attendence','AttendenceController@create');
// Route::get('attendence-list','AttendenceController@index');
// Route::post('/addAttendence','AttendenceController@store');
// Route::get('editAttendence/{id}','AttendenceController@edit');
// Route::post('updateAttendence','AttendenceController@update');
// Route::get('delAttendence/{id}','AttendenceController@destroy');
	//charges routes
// Route::get('/charges','HomeController@charges');
// Route::get('/charges-list','HomeController@chargeList');
// Route::post('/addCharges','HomeController@add_charges');
// Route::get('editCharges/{id}','HomeController@edit_charges');
// Route::post('updateCharges','HomeController@update_charges');
// Route::get('delCharges/{id}','HomeController@del_charges');
// 	//teachers routes
// Route::get('teachers','TeachersController@create');
// Route::get('teachers-list','TeachersController@index');
// Route::post('/addTeachers','TeachersController@store');
// Route::get('/editTeacher/{id}','TeachersController@edit');
// Route::post('updateTeacher','TeachersController@update');
// Route::get('delTeacher/{id}', 'TeachersController@destroy');