<?php

$dataStudents = [
    [
        'id' => 1,
        'name' => 'Alice Johnson',
        'email' => 'alice.j@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Nü',
        'address' => '123 Main St, City, State',
        'status' => 'Đang học',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg',
        'studentId' => 'STU001'
    ],
    [
        'id' => 2,
        'name' => 'Bob Smith',
        'email' => 'bob.s@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Nam',
        'address' => '456 Oak Ave, City, State',
        'status' => 'Đang học',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg',
        'studentId' => 'STU002'
    ],
    [
        'id' => 3,
        'name' => 'Charlie Davis',
        'email' => 'charlie.d@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Nam',
        'address' => '789 Pine St, City, State',
        'status' => 'Bảo lưu',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg',
        'studentId' => 'STU003'
    ],
    [
        'id' => 4,
        'name' => 'Diana Wilson',
        'email' => 'diana.w@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Nü',
        'address' => '123 Main St, City, State',
        'status' => 'Thôi học',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg',
        'studentId' => 'STU004'
    ],
    [
        'id' => 5,
        'name' => 'Diana Wilson',
        'email' => 'diana.w@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Female',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1998-05-30',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 6,
        'name' => 'Eva Brown',
        'email' => 'eva.b@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Female',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1997-09-12',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 7,
        'name' => 'Frank Miller',
        'email' => 'frank.m@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Male',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1999-11-25',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 8,
        'name' => 'Grace Lee',
        'email' => 'grace.l@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Female',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1998-08-18',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 9,
        'name' => 'Henry Taylor',
        'email' => 'henry.t@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Male',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1997-04-05',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 10,
        'name' => 'Ivy Chen',
        'email' => 'ivy.c@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Female',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1999-12-20',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ],
    [
        'id' => 11,
        'name' => 'Jack White',
        'email' => 'jack.w@school.edu',
        'phone' => '123-456-7890',
        'gender' => 'Male',
        'address' => '123 Main St, City, State',
        'dateOfBirth' => '1998-06-14',
        'image' => 'images/hinh-nen-dai-ngan-ha-3d-chat_084831164.jpg'
    ]

];

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = $dataStudents;
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if ($_GET['action'] === 'get' && isset($_GET['id'])) {
        $studentId = $_GET['id'];
        $students = $_SESSION['students'];

        $foundStudent = null;
        foreach ($students as $student) {
            if ($student['id'] === $studentId) {
                $foundStudent = $student;
                break;
            }
        }

        header('Content-Type: application/json');
        if ($foundStudent) {
            echo json_encode($foundStudent);
        } else {
            echo json_encode(null);
        }
        exit;
    }
}
