<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <style type="text/css" id="debugbar_dynamic_style"></style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Codeigniter Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Codeigniter Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Salary | Employees</title>

    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/line-awesome.min.css">
    <link rel="stylesheet" href="../public/plugins/alertify/alertify.min.css">
    <link rel="stylesheet" href="../public/plugins/lightbox/glightbox.min.css">
    <link rel="stylesheet" href="../public/plugins/c3-chart/c3.min.css">
    <link rel="stylesheet" href="../public/plugins//toastr/toatr.css">
    <link rel="stylesheet" href="../public/css/select2.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../public/css/fullcalendar.min.css">
    <link rel="stylesheet" href="../public/plugins/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="../public/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/css/style.css">





    
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="dashboard" class="logo">
                    <img src="../public/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <div class="page-title-box">
                <h3>Dreamguy's Technologies</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu">
                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="search">
                            <input class="form-control" type="text" placeholder="Search here">
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow flag-nav">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
                        <img src="../public/img/flags/us.png" alt="" height="20"> <span>English</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../public/img/flags/us.png" alt="" height="16"> English
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../public/img/flags/fr.png" alt="" height="16"> French
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../public/img/flags/es.png" alt="" height="16"> Spanish
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="../public/img/flags/de.png" alt="" height="16"> German
                        </a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-bell-o"></i> <span class="badge rounded-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="../public/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added
                                                    new task <span class="noti-title">Patient appointment booking</span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="../public/img/profiles/avatar-03.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span>
                                                    changed the task name <span class="noti-title">Appointment booking
                                                        with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="../public/img/profiles/avatar-06.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                                    added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="../public/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                                    completed task <span class="noti-title">Patient and Doctor video
                                                        conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities">
                                        <div class="media d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img alt="" src="../public/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span>
                                                    added new task <span class="noti-title">Private apps-chat
                                                        module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Messages</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="apps-chat">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="../public/img/profiles/avatar-09.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Richard Miles </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="apps-chat">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="../public/img/profiles/avatar-02.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">John Doe</span>
                                                <span class="message-time">6 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="apps-chat">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="../public/img/profiles/avatar-03.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Tarah Shropshire </span>
                                                <span class="message-time">5 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="apps-chat">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="../public/img/profiles/avatar-05.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Mike Litorus</span>
                                                <span class="message-time">3 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="apps-chat">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="../public/img/profiles/avatar-08.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Catherine Manseau </span>
                                                <span class="message-time">27 Feb</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="apps-chat">View all Messages</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="../public/img/profiles/avatar-21.jpg" alt="">
                            <span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile">My Profile</a>
                        <a class="dropdown-item" href="settings">Settings</a>
                        <a class="dropdown-item" href="auth-login">Logout</a>
                    </div>
                </li>
            </ul>

        </div>



        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="dashboard">Admin Dashboard</a></li>
                                <li><a class="" href="employee_dashboard">Employee Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="apps-chat">Chat</a></li>
                                <li class="submenu">
                                    <a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a class="" href="voice_call">Voice Call</a></li>
                                        <li><a class="" href="video_call">Video Call</a></li>
                                        <li><a class="" href="outgoing_call">Outgoing Call</a></li>
                                        <li><a class="" href="incoming_call">Incoming Call</a></li>
                                    </ul>
                                </li>
                                <li><a class="" href="apps-calendar">Calendar</a></li>
                                <li><a class="" href="contact">Contacts</a></li>
                                <li><a class="" href="inbox">Email</a></li>
                                <li><a class="" href="file_manager">File Manager</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Employees</span>
                        </li>
                        <li class="submenu">
                            <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="employees">All Employees</a></li>
                                <li><a class="" href="holidays">Holidays</a></li>
                                <li><a class="" href="leaves">Leaves (Admin) <span class="badge rounded-pill bg-primary float-end">1</span></a></li>
                                <li><a class="" href="leaves_employee">Leaves (Employee)</a></li>
                                <li><a class="" href="leaves_settings">Leave Settings</a></li>
                                <li><a class="" href="attendance">Attendance (Admin)</a></li>
                                <li><a class="" href="attendance_employee">Attendance (Employee)</a></li>
                                <li><a class="" href="departments">Departments</a></li>
                                <li><a class="" href="designations">Designations</a></li>
                                <li><a class="" href="timesheet">Timesheet</a></li>
                                <li><a class="" href="shift_scheduling">Shift & Schedule</a></li>
                                <li><a class="" href="overtime">Overtime</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="clients"><i class="la la-users"></i> <span>Clients</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="projects">Projects</a></li>
                                <li><a class="" href="tasks">Tasks</a></li>
                                <li><a class="" href="task_board">Task Board</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="leads"><i class="la la-user-secret"></i> <span>Leads</span></a>
                        </li>
                        <li class="">
                            <a href="tickets"><i class="la la-ticket"></i> <span>Tickets</span></a>
                        </li>
                        <li class="menu-title">
                            <span>HR</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-files-o"></i> <span> Sales </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="estimates">Estimates</a></li>
                                <li><a class="" href="invoices">Invoices</a></li>
                                <li><a class="" href="payments">Payments</a></li>
                                <li><a class="" href="expenses">Expenses</a></li>
                                <li><a class="" href="provident_fund">Provident Fund</a></li>
                                <li><a class="" href="taxes">Taxes</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="categories">Categories</a></li>
                                <li><a class="" href="budgets">Budgets</a></li>
                                <li><a class="" href="budget_expenses">Budget Expenses</a></li>
                                <li><a class="" href="budget_revenues">Budget Revenues</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="active" href="salary"> Employee Salary </a></li>
                                <li><a class="" href="salary_view"> Payslip </a></li>
                                <li><a class="" href="payroll_item"> Payroll Items </a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="policies"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="expense_reports"> Expense Report </a></li>
                                <li><a class="" href="invoice_reports"> Invoice Report </a></li>
                                <li><a class="" href="payment_reports"> Payments Report </a></li>
                                <li><a class="" href="project_reports"> Project Report </a></li>
                                <li><a class="" href="task_reports"> Task Report </a></li>
                                <li><a class="" href="user_reports"> User Report </a></li>
                                <li><a class="" href="employee_reports"> Employee Report </a></li>
                                <li><a class="" href="payslip_reports"> Payslip Report </a></li>
                                <li><a class="" href="attendance_reports"> Attendance Report </a></li>
                                <li><a class="" href="leave_reports"> Leave Report </a></li>
                                <li><a class="" href="daily_reports"> Daily Report </a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Performance</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="performance_indicator"> Performance Indicator </a></li>
                                <li><a class="" href="performance"> Performance Review </a></li>
                                <li><a class="" href="performance_appraisal"> Performance Appraisal </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="goal_tracking"> Goal List </a></li>
                                <li><a class="" href="goal_type"> Goal Type </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="training"> Training List </a></li>
                                <li><a class="" href="trainers"> Trainers</a></li>
                                <li><a class="" href="training_type"> Training Type </a></li>
                            </ul>
                        </li>
                        <li class=""><a href="promotions"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
                        <li class=""><a href="resignation"><i class="la la-external-link-square"></i>
                                <span>Resignation</span></a></li>
                        <li class=""><a href="termination"><i class="la la-times-circle"></i>
                                <span>Termination</span></a></li>
                        <li class="menu-title">
                            <span>Administration</span>
                        </li>
                        <li class="">
                            <a href="../public_list"><i class="la la-object-ungroup"></i> <span>../public</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="user_dashboard"> User Dasboard </a></li>
                                <li><a class="" href="jobs_dashboard"> Jobs Dasboard </a></li>
                                <li><a class="" href="jobs"> Manage Jobs </a></li>
                                <li><a class="" href="manage_resumes"> Manage Resumes </a></li>
                                <li><a class="" href="shortlist_candidates"> Shortlist Candidates </a></li>
                                <li><a class="" href="interview_questions"> Interview Questions </a></li>
                                <li><a class="" href="offer_approvals"> Offer Approvals </a></li>
                                <li><a class="" href="experiance_level"> Experience Level </a></li>
                                <li><a class="" href="candidates"> Candidates List </a></li>
                                <li><a class="" href="schedule_timing"> Schedule timing </a></li>
                                <li><a class="" href="apptitude_result"> Aptitude Results </a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="knowledgebase"><i class="la la-question"></i> <span>Knowledgebase</span></a>
                        </li>
                        <li class="">
                            <a href="activities"><i class="la la-bell"></i> <span>Activities</span></a>
                        </li>
                        <li class="">
                            <a href="users"><i class="la la-user-plus"></i> <span>Users</span></a>
                        </li>
                        <li class="">
                            <a href="settings"><i class="la la-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="profile"> Employee Profile </a></li>
                                <li><a class="" href="clients_profile"> Client Profile </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="index"> Login </a></li>
                                <li><a class="" href="auth-register"> Register </a></li>
                                <li><a class="" href="auth-recoverpw"> Forgot Password </a></li>
                                <li><a class="" href="otp"> OTP </a></li>
                                <li><a class="" href="auth-lock-screen"> Lock Screen </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="error-404">404 Error </a></li>
                                <li><a class="" href="error-500">500 Error </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="subscriptions"> Subscriptions (Admin) </a></li>
                                <li><a class="" href="subscriptions_company"> Subscriptions (Company) </a></li>
                                <li><a class="" href="subscribed_companies"> Subscribed Companies</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="search"> Search </a></li>
                                <li><a class="" href="faq"> FAQ </a></li>
                                <li><a class="" href="terms"> Terms </a></li>
                                <li><a class="" href="privacy_policy"> Privacy Policy </a></li>
                                <li><a class="" href="blank_page"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>UI Interface</span>
                        </li>
                        <li class="">
                            <a href="components"><i class="la la-puzzle-piece"></i> <span>Components</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="lab la-dropbox"></i> <span> Elements</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="sweet_alerts">Sweet Alerts</a></li>
                                <li><a class="" href="lightbox">Lightbox</a></li>
                                <li><a class="" href="tooltip">Tooltip</a></li>
                                <li><a class="" href="notifications">Notification</a></li>
                                <li><a class="" href="toaster">Toaster</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="las la-chart-bar"></i> <span>Charts</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="apex_charts">Apex Charts</a></li>
                                <li><a class="" href="chart_js">Chart js</a></li>
                                <li><a class="" href="peity_charts">Peity Charts</a></li>
                                <li><a class="" href="c3_charts">C3 Charts</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="form_basic_inputs">Basic Inputs </a></li>
                                <li><a class="" href="form_input_groups">Input Groups </a></li>
                                <li><a class="" href="form_horizontal">Horizontal Form </a></li>
                                <li><a class="" href="form_vertical"> Vertical Form </a></li>
                                <li><a class="" href="form_mask"> Form Mask </a></li>
                                <li><a class="" href="form_validation"> Form Validation </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="table_basic">Basic Tables </a></li>
                                <li><a class="" href="data_tables">Data Table </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="page-wrapper">

            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Employee Salary</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Salary</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
                        </div>
                    </div>
                </div>


                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group custom-select">
                            <select class="select floating">
                                <option value="">Select Role</option>
                                <option value="">Employee</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group custom-select">
                            <select class="select floating">
                                <option>Leave Status</option>
                                <option> Pending </option>
                                <option> Approved </option>
                                <option> Rejected </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">From</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">To</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <a href="#" class="btn btn-success w-100"> Search </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                        <th>Role</th>
                                        <th>Salary</th>
                                        <th>Payslip</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img alt="" src="../public/img/profiles/avatar-02.jpg"></a>
                                                <a href="profile">John Doe <span>Web Designer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0001</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="355f5a5d5b515a5075504d54584559501b565a58">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Web Designer </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$59698</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-09.jpg" alt=""></a>
                                                <a href="profile">Richard Miles <span>Web Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0002</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="32405b515a5340565f5b5e574172574a535f425e571c515d5f">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Web Developer </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$72000</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-10.jpg" alt=""></a>
                                                <a href="profile">John Smith <span>Android Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0003</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f09a9f989e839d998498b09588919d809c95de939f9d">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Android Developer
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$48200</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-05.jpg" alt=""></a>
                                                <a href="profile">Mike Litorus <span>IOS Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0004</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="45282c2e20292c312a37303605203d24283529206b262a28">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">IOS Developer </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$59698</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-11.jpg" alt=""></a>
                                                <a href="profile">Wilmer Deluna <span>Team Leader</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0005</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="73041a1f1e160117161f061d1233160b121e031f165d101c1e">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Team Leader </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$43000</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-12.jpg" alt=""></a>
                                                <a href="profile">Jeffrey Warden <span>Web Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0006</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c06090a0a1e09151b0d1e0809022c09140d011c0009420f0301">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Web Developer</a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$45000</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-13.jpg" alt=""></a>
                                                <a href="profile">Bernardo Galaviz <span>Web Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0007</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="086a6d7a66697a6c676f6964697e6172486d70696578646d266b6765">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2014</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Web Developer </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$38400</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-01.jpg" alt=""></a>
                                                <a href="profile">Lesley Grauer <span>Team Leader</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0008</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jun 2015</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Team Leader </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$75500</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-16.jpg" alt=""></a>
                                                <a href="profile">Jeffery Lalor <span>Team Leader</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0009</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1d77787b7b786f64717c71726f5d78657c706d7178337e7270">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Team Leader </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$73550</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-04.jpg" alt=""></a>
                                                <a href="profile">Loren Gatlin <span>Android Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0010</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8de1e2ffe8e3eaecf9e1e4e3cde8f5ece0fde1e8a3eee2e0">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Android Developer
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$55000</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img src="../public/img/profiles/avatar-03.jpg" alt=""></a>
                                                <a href="profile">Tarah Shropshire <span>Android Developer</span></a>
                                            </h2>
                                        </td>
                                        <td>FT-0011</td>
                                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9aeefbe8fbf2e9f2e8f5eae9f2f3e8ffdaffe2fbf7eaf6ffb4f9f5f7">[email&#160;protected]</a>
                                        </td>
                                        <td>1 Jan 2013</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Android Developer
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Software Engineer</a>
                                                    <a class="dropdown-item" href="#">Software Tester</a>
                                                    <a class="dropdown-item" href="#">Frontend Developer</a>
                                                    <a class="dropdown-item" href="#">UI/UX Developer</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$92400</td>
                                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_salary" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Staff Salary</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Staff</label>
                                            <select class="select">
                                                <option>John Doe</option>
                                                <option>Richard Miles</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Net Salary</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="text-primary">Earnings</h4>
                                        <div class="form-group">
                                            <label>Basic</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>DA(40%)</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>HRA(15%)</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Conveyance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Allowance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Medical Allowance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="add-more">
                                            <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="text-primary">Deductions</h4>
                                        <div class="form-group">
                                            <label>TDS</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>ESI</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>PF</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Leave</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Prof. Tax</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Labour Welfare</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="add-more">
                                            <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_salary" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Staff Salary</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Staff</label>
                                            <select class="select">
                                                <option>John Doe</option>
                                                <option>Richard Miles</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Net Salary</label>
                                        <input class="form-control" type="text" value="$4000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="text-primary">Earnings</h4>
                                        <div class="form-group">
                                            <label>Basic</label>
                                            <input class="form-control" type="text" value="$6500">
                                        </div>
                                        <div class="form-group">
                                            <label>DA(40%)</label>
                                            <input class="form-control" type="text" value="$2000">
                                        </div>
                                        <div class="form-group">
                                            <label>HRA(15%)</label>
                                            <input class="form-control" type="text" value="$700">
                                        </div>
                                        <div class="form-group">
                                            <label>Conveyance</label>
                                            <input class="form-control" type="text" value="$70">
                                        </div>
                                        <div class="form-group">
                                            <label>Allowance</label>
                                            <input class="form-control" type="text" value="$30">
                                        </div>
                                        <div class="form-group">
                                            <label>Medical Allowance</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="text-primary">Deductions</h4>
                                        <div class="form-group">
                                            <label>TDS</label>
                                            <input class="form-control" type="text" value="$300">
                                        </div>
                                        <div class="form-group">
                                            <label>ESI</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>PF</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>Leave</label>
                                            <input class="form-control" type="text" value="$250">
                                        </div>
                                        <div class="form-group">
                                            <label>Prof. Tax</label>
                                            <input class="form-control" type="text" value="$110">
                                        </div>
                                        <div class="form-group">
                                            <label>Labour Welfare</label>
                                            <input class="form-control" type="text" value="$10">
                                        </div>
                                        <div class="form-group">
                                            <label>Fund</label>
                                            <input class="form-control" type="text" value="$40">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text" value="$15">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal custom-modal fade" id="delete_salary" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Salary</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>





    <div class="modal right fade settings" id="settings" role="dialog" aria-modal="true">
        <div class="toggle-close">
            <div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </div>
        </div>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="scroll">
                        <div>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="theme-settings-swatches">
                                        <div class="themes">
                                            <div class="themes-body">
                                                <ul id="theme-change" class="theme-colors border-0 list-inline-item list-unstyled mb-0">
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-orange" onclick="toggleTheme('style')"></span></li>
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-blue" onclick="toggleTheme('style-blue')"></span></li>
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-dark" onclick="toggleTheme('style-dark')"></span></li>
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-light" onclick="toggleTheme('style-light')"></span></li>
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-maroon" onclick="toggleTheme('style-maroon')"></span></li>
                                                    <li class="list-inline-item"><span class="theme-solid-black bg-purple" onclick="toggleTheme('style-purple')"></span></li>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-contact">
        <div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i></div>
    </div>
    <div id="themesettings">
    </div>

</body>