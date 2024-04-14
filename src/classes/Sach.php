<?php

namespace CT275\Labs;

use PDO;

class Sach
{
    private ?PDO $db;

    private $maSach;
    public $tenSach;
    public $giaSach;
    public $hinhAnh;
    public $maTG;
    public $maTL; 
    public $maNXB;
    public $namXuatBan;
    public $mota;
//  private array $errors = [];

    public function getId(): int
    {
        return $this->maSach;
    }

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }
/*
    public function fill(array $data): Sach
    {
        $this->maSach = $data['maSach'] ?? '';
        $this->tenSach = $data['tenSach'] ?? '';
        $this->giaSach = $data['giaSach'] ?? '';
        $this->hinhAnh = $data['hinhAnh'] ?? '';
        $this->namXuatBan = $data['namXuatBan'] ?? '';
        $this->mota = $data['mota'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        //---Mã sách---
        $validBookCode = preg_match(
            '/^S[0-9]{3}\b$/',
            $this->maSach
        );

        if (!$validBookCode) {
            $this->errors['maSach'] = 'Invalid book code.';
        }

        $query = "SELECT COUNT(*) FROM sach WHERE maSach = :maSach";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':maSach', $this->maSach);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $this->errors['maSach'] = 'Book code already exists.';
        }

        //---Tên sách---
        $tenSach = trim($this->tenSach);
        if (!$tenSach) {
            $this->errors['tenSach'] = 'Invalid book name.';
        }

        //---Giá sách---
        if (preg_match('/[a-zA-Z!@#$%^&*()_+\-=\[\]{};\'\\:"|,.<>\/?~]/', $this->giaSach)) {
            $this->errors['giaSach'] = 'Invalid book price.';
        }

        if (!preg_match('/^[1-9][0-9]*(?:000)?$/', $this->giaSach)) {
            $this->errors['giaSach'] = 'Book price must be an integer.';
        }

        return empty($this->errors);
    }
*/
    public function all(): array
    {
        $books = [];

        $statement = $this->db->prepare('select * from sach');
        $statement->execute();
        while ($row = $statement->fetch()) {
            $book = new Sach($this->db);
            $book->fillFromDB($row);
            $books[] = $book;
        }
        return $books;
    }

    protected function fillFromDB(array $row): Sach
    {
        [
            'maSach' => $this->maSach,
            'tenSach' => $this->tenSach,
            'giaSach' => $this->giaSach,
            'hinhAnh' => $this->hinhAnh,
            'maTG' => $this->maTG,
            'maTL' => $this->maTL,
            'maNXB' => $this->maNXB,
            'namXuatBan' => $this->namXuatBan,
            'mota' => $this->mota
        ] = $row;
        return $this;
    }

    public function count(): int
    {
        $statement = $this->db->prepare('select count(*) from sach');
        $statement->execute();
        return $statement->fetchColumn();
    }

    public function paginate(int $offset = 0, int $limit = 9): array
    {
        $books = [];

        $statement = $this->db->prepare('select * from sach limit :offset, :limit');
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        while ($row = $statement->fetch()) {
            $book = new Sach($this->db);
            $book->fillFromDB($row);
            $books[] = $book;
        }
        return $books;
    }

/*
    public function save(): bool
    {
        $result = false;

        if (isset($this->maSach) && preg_match('/^S[0-9]{3}\b$/', $this->maSach)) {
            $statement = $this->db->prepare(
                'update sach set maSach = :maSach, tenSach = :tenSach,
                    giaSach = :giaSach, hinhAnh = :hinhAnh, namXuatBan = :namXuatBan, mota = :mota
                    where maSach = :maSach'
            );
            $result = $statement->execute([
                'maSach' => $this->maSach,
                'tenSach' => $this->tenSach,
                'giaSach' => $this->giaSach,
                'hinhAnh' => $this->hinhAnh,
                'namXuatBan' => $this->namXuatBan,
                'namXuatBan' => $this->namXuatBan
            ]);
        } else {
            $statement = $this->db->prepare(
                'insert into sach (maSach, tenSach, giaSach, hinhAnh, namXuatBan, mota)
                    values (:maSach, :tenSach, :giaSach, :hinhAnh, :namXuatBan, :mota)'
            );
            $result = $statement->execute([
                'maSach' => $this->maSach,
                'tenSach' => $this->tenSach,
                'giaSach' => $this->giaSach,
                'hinhAnh' => $this->hinhAnh,
                'namXuatBan' => $this->namXuatBan,
                'namXuatBan' => $this->namXuatBan
            ]);
            if ($result) {
                $this->maSach = $this->db->lastInsertId();
            }
        }
        return $result;
    }
*/

    public function find(string $keyword, string $field): ?Sach
    {
        $query = 'SELECT * FROM sach WHERE ';
        $params = [];
        
        switch ($field) {
            case 'maSach':
                $query .= 'maSach = :keyword';
                break;
            case 'tenSach':
                $query .= 'tenSach LIKE :keyword';
                $keyword = "%$keyword%"; 
                break;
            case 'giaSach':
                $query .= 'giaSach = :keyword';
                break;
            case 'namXuatBan':
                $query .= 'namXuatBan = :keyword';
                break;
            case 'moTa':
                $query .= 'moTa LIKE :keyword';
                $keyword = "%$keyword%"; 
                break;
            default:
                return null;
        }

        $statement = $this->db->prepare($query);
        $statement->execute(['keyword' => $keyword]);

        if ($row = $statement->fetch()) {
            $this->fillFromDB($row);
            return $this;
        }
        return null;
    }


    public function findbasedonAuthor(int $maTG): ?Sach
    {
        $statement = $this->db->prepare('select * from sach where maTG = :maTG');
        $statement->execute(['maTG' => $maTG]);

        if ($row = $statement->fetch()) {
            $this->fillFromDB($row);
            return $this;
        }
        return null;
    }

    public function findbasedonCategory(int $maTL): ?Sach
    {
        $statement = $this->db->prepare('select * from sach where maTL = :maTL');
        $statement->execute(['maTL' => $maTL]);

        if ($row = $statement->fetch()) {
            $this->fillFromDB($row);
            return $this;
        }
        return null;
    }

    public function findbasedonPublisher(int $maNXB): ?Sach
    {
        $statement = $this->db->prepare('select * from sach where maNXB = :maNXB');
        $statement->execute(['maNXB' => $maNXB]);

        if ($row = $statement->fetch()) {
            $this->fillFromDB($row);
            return $this;
        }
        return null;
    }


/*    
    public function update(array $data): bool
    {
        $this->fill($data);
        if ($this->validate()) {
            return $this->save();
        }
        return false;
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('delete from sach where maSach = :maSach');
        return $statement->execute(['maSach' => $this->maSach]);
    }
*/
}
