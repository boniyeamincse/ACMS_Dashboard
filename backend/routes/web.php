<?php
require_once '../controllers/AuthController.php';
require_once '../controllers/DashboardController.php';
require_once '../controllers/StudentController.php';
require_once '../controllers/ExamController.php';
require_once '../controllers/AdmitCardController.php';
require_once '../controllers/ReportController.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        $authController = new AuthController();
        $authController->login();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'change_password':
        $authController = new AuthController();
        $authController->changePassword();
        break;
    case 'reset_password':
        $authController = new AuthController();
        $authController->resetPassword();
        break;
    case 'enable_2fa':
        $authController = new AuthController();
        $authController->enable2FA();
        break;
    case 'get_statistics':
        $dashboardController = new DashboardController();
        $dashboardController->getStatistics();
        break;
    case 'get_recent_activities':
        $dashboardController = new DashboardController();
        $dashboardController->getRecentActivities();
        break;
    case 'get_notifications':
        $dashboardController = new DashboardController();
        $dashboardController->getNotifications();
        break;
    case 'register_student':
        $studentController = new StudentController();
        $studentController->register();
        break;
    case 'bulk_upload_students':
        $studentController = new StudentController();
        $studentController->bulkUpload();
        break;
    case 'search_students':
        $studentController = new StudentController();
        $studentController->search();
        break;
    case 'view_student_profile':
        $studentController = new StudentController();
        $studentController->viewProfile($_GET['student_id']);
        break;
    case 'verify_student':
        $studentController = new StudentController();
        $studentController->verify($_GET['student_id']);
        break;
    case 'add_exam':
        $examController = new ExamController();
        $examController->addExam();
        break;
    case 'update_exam':
        $examController = new ExamController();
        $examController->updateExam($_GET['exam_id']);
        break;
    case 'delete_exam':
        $examController = new ExamController();
        $examController->deleteExam($_GET['exam_id']);
        break;
    case 'get_exam_schedule':
        $examController = new ExamController();
        $examController->getExamSchedule();
        break;
    case 'manage_exam_centers':
        $examController = new ExamController();
        $examController->manageExamCenters();
        break;
    case 'generate_admit_cards':
        $admitCardController = new AdmitCardController();
        $admitCardController->generateAdmitCards();
        break;
    case 'download_admit_card':
        $admitCardController = new AdmitCardController();
        $admitCardController->downloadAdmitCard($_GET['admit_card_id']);
        break;
    case 'print_admit_cards':
        $admitCardController = new AdmitCardController();
        $admitCardController->printAdmitCards();
        break;
    case 'preview_admit_card':
        $admitCardController = new AdmitCardController();
        $admitCardController->previewAdmitCard($_GET['admit_card_id']);
        break;
    case 'validate_admit_card':
        $admitCardController = new AdmitCardController();
        $admitCardController->validateAdmitCard($_GET['admit_card_id']);
        break;
    case 'bulk_generate_admit_cards':
        $admitCardController = new AdmitCardController();
        $admitCardController->bulkGenerateAdmitCards();
        break;
    case 'track_admit_card_status':
        $admitCardController = new AdmitCardController();
        $admitCardController->trackAdmitCardStatus();
        break;
    case 'cancel_or_modify_admit_card':
        $admitCardController = new AdmitCardController();
        $admitCardController->cancelOrModifyAdmitCard($_GET['admit_card_id']);
        break;
    case 'generate_admit_card_report':
        $reportController = new ReportController();
        $reportController->generateAdmitCardReport();
        break;
    case 'generate_exam_wise_report':
        $reportController = new ReportController();
        $reportController->generateExamWiseReport();
        break;
    case 'generate_student_wise_report':
        $reportController = new ReportController();
        $reportController->generateStudentWiseReport();
        break;
    case 'generate_historical_reports':
        $reportController = new ReportController();
        $reportController->generateHistoricalReports();
        break;
    case 'monitor_performance_metrics':
        $reportController = new ReportController();
        $reportController->monitorPerformanceMetrics();
        break;
    default:
        // Default action
        break;
}