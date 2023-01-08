<?php

require_once('system/providers/db_provider.php');

class NewsService extends DbProvider
{
    public function add_news($title, $about, $details, $photo, $source, $publish)
    {
        $query = 'insert into news ';
        $query .= '(title, about, details, photo, source, publish) ';
        $query .= 'values (?, ?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('ssssss', $title, $about, $details, $photo, $source, $publish);
        if (!$stmt->execute()) {
            throw new Exception('Помилка виконання SQL-запиту на додавання новини');
        }
    }

    public function get_news()
    {
        $news = [];
        $query = 'select * from news ';
        $query .= 'order by id';
        $result = $this->_conn->query($query);

        if (!$result) {
            throw new Exception('Помилка виконання SQL-запиту на отримання новини');
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $news[] = $row;
            }
        }
        return $news;
    }

    public function get_news_details($id)
    {
        $query = 'select * from news ';
        $query .= 'where id = ?';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('i', $id);
        if (!$stmt->execute()) {
            throw new Exception('Помилка виводу');
        }
        $stmt->execute();
        $news = $stmt->get_result()->fetch_assoc();
        if (isset($news)) {
            $stmt->close();
            return $news;
        }

        $stmt->close();
        return false;
    }

    public function edit_news($id, $title, $about, $details, $photo, $source, $publish)
    {
        $query = 'update news ';
        $query .= 'set title=?, about=?, details=?, photo=?, source=?, publish=? ';
        $query .= 'where id=?';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('ssssssi', $title, $about, $details, $photo, $source, $publish, $id);
        if (!$stmt->execute()) {
            throw new Exception('Помилка виконання SQL-запиту на редагування новини');
        }
    }

    public function delete_news($id)
    {
        $query = 'delete from news ';
        $query .= 'where id=?';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('i', $id);
        if (!$stmt->execute()) {
            throw new Exception('Помилка виконання SQL-запиту на видалення новини');
        }
    }
}
