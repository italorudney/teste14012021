<?PHP

namespace App\DAO;

use App\Models\PessoaModel;

class PessoasDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPessoas(): array
    {
        $pessoas = $this->pdo
            ->query('SELECT * FROM loc_pessoas;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $pessoas;
    }

    public function insertPessoa(PessoaModel $pessoa): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO loc_pessoas (per_id,per_nome,per_contato,per_cpf_cnpj) VALUES(
                null,
                :per_nome,
                :per_contato,
                :per_cpf_cnpj
            );');
        $statement->execute([
            'per_nome' => $pessoa->getPer_nome(),
            'per_contato' => $pessoa->getPer_contato(),
            'per_cpf_cnpj' => $pessoa->getPer_cpf_cnpj()
        ]);
    }

    public function updatePessoa(PessoaModel $pessoa): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE loc_pessoas SET
                     per_nome =:per_nome,
                     per_contato =:per_contato,
                     per_cpf_cnpj =:per_cpf_cnpj
                WHERE
                per_id = :per_id
            ;');
        $statement->execute([
            'per_nome' => $pessoa->getPer_nome(),
            'per_contato' => $pessoa->getPer_contato(),
            'per_cpf_cnpj' => $pessoa->getPer_cpf_cnpj(),
            'per_id' => $pessoa->getPer_id()
        ]);
    }

    public function deletePessoa(int $per_id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM loc_clientes WHERE per_id = :per_id;
                DELETE FROM loc_pessoas WHERE per_id = :per_id;
            ');
        $statement->execute([
            'per_id' => $per_id
        ]);
    }
}