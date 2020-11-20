<?php

class CourseController
{
    public function index()
	{
		$query = "SELECT * FROM courses";
        $data = DB::query($query);
        for ($index=0; $index < count($data); $index++) { 
            $query_list = "SELECT id, item FROM course_learn_list WHERE course_id=:course_id LIMIT 2";
            $list = DB::query($query_list, ['course_id' => $data[$index]['id']]);
            $data[$index]['list'] = $list;
        }
        echo json_encode($data);
        http_response_code(200);
    }
    
    public function show($id)
	{
		$query = "SELECT * FROM courses WHERE id=:id";
        $data = DB::query($query, [':id' => $id]);
        echo json_encode($data[0]);
        http_response_code(200);
    }
    
    public function showWithList($id)
	{
		$query = "SELECT * FROM courses WHERE id=:id";
        $data = DB::query($query, [':id' => $id]);
        $query_list = "SELECT id, item FROM course_learn_list WHERE course_id=:course_id";
        $list = DB::query($query_list, ['course_id' => $id]);
        $data[0]['list'] = $list;
        echo json_encode($data[0]);
        http_response_code(200);
    }
    
    public function search()
	{
        if(!isset($_GET['search']) || empty($_GET['search'])){
            echo json_encode(['message' => 'Type in your search in the Search Bar!']);
            http_response_code(203);
        }
        else {
            $search = $_GET['search'];
            $queryCourse = "SELECT * FROM courses WHERE MATCH(course, description) AGAINST(:search IN BOOLEAN MODE)";
            $courses = DB::query($queryCourse, [':search' => $search]);

            $queryCourseLearn = "SELECT DISTINCT course_id FROM course_learn_list WHERE MATCH( item ) AGAINST(:search IN BOOLEAN MODE)";
            $learn = DB::query($queryCourseLearn, [':search' => $search]);

            if (count($learn) > 0) {
                $queryCourse = "SELECT * FROM courses WHERE id=:id LiMIT 1";
                foreach ($learn as $key) {
                    if (!array_search($key['course_id'], array_column($courses, 'id', 'id'))) {
                        $byId = DB::query($queryCourse, [':id' => $key['course_id']]);
                        array_push($courses, $byId[0]);
                    }
                }
            }

            if (count($courses) > 0 ) {
                for ($index=0; $index < count($courses); $index++) { 
                    $query_list = "SELECT id, item FROM course_learn_list WHERE course_id=:course_id LIMIT 2";
                    $list = DB::query($query_list, ['course_id' => $courses[$index]['id']]);
                    $courses[$index]['list'] = $list;
                }
                echo json_encode($courses);
                http_response_code(200);
            }
            else {
                echo json_encode(['message' => 'Sorry! there are no results of what you are looking for.']);
                http_response_code(203);
            }
        }
    }

    public function filter()
	{
        $query = "SELECT * FROM courses WHERE course_type LIKE :course_type AND qualifications LIKE :qualifications";
        $params = [
            ':course_type' => '%'.$_GET['type'].'%',
            ':qualifications' => '%'.$_GET['qualification'].'%'
        ];
        $courses = DB::query($query, $params);
        if (count($courses) > 0 ) {
            for ($index=0; $index < count($courses); $index++) { 
                $query_list = "SELECT id, item FROM course_learn_list WHERE course_id=:course_id LIMIT 2";
                $list = DB::query($query_list, ['course_id' => $courses[$index]['id']]);
                $courses[$index]['list'] = $list;
            }
            echo json_encode($courses);
            http_response_code(200);
        }
        else {
            echo json_encode(['message' => 'currently there no course matching that filtering']);
            http_response_code(203);
        }
    }
}