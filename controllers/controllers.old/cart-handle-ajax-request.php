<?php

$result = [
        [
            'student_id' => 1234567,
            'name' => 'Mohammad',
            'Assignments' => 14,
            'Exam' => 4
        ],
        [
            'student_id' => 1298765,
            'name' => 'Fahad',
            'Assignments' => 12,
            'Exam' => 3.5
        ],
        [
            'student_id' => 1589922,
            'name' => 'Ahmad',
            'Assignments' => 15,
            'Exam' => 4.5
        ]
        
    ];
	
	echo json_encode($result);
	
	?>