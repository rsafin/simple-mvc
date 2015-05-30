<?php

namespace App\Controller;

use App\Controller;
use App\Model\Student;

class StudentsController extends Controller
{

    public function IndexAction()
    {
        $studentRepository = $this->_manager->getRepository('\App\Model\Student');
        $students = $studentRepository->findAll();

        $this->render(array("students" => $students));
    }

    public function viewAction($id)
    {
        $student = $this->_manager->find('\App\Model\Student', $id);
        $this->render(array("student" => $student));
    }

    public function createAction()
    {
        $student = new Student();

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->render();
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $params = $_POST[$this->_registry->controller];
            $student->setArguments($params);
            $this->_manager->persist($student);
            $this->_manager->flush();
            header("location:http://localhost:8888/simple-mvc/index.php?r=students");
        }
    }
}