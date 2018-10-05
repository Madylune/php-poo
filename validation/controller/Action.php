<?php

$content = $_POST['content'];

public function updateSection() {
    $request = $this->dbConnec->prepare('UPDATE '. $this->table.' SET content="'.$content.'" WHERE title="'.$value .'"');
    $request->execute(['value' => $value]);
    $result = $request->fetch();
    if($result !== null) {
        return $result;
    } else {
        return false;
    }
};

header('Location: /home');
exit();
