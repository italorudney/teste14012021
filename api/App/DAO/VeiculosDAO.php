<?PHP

namespace App\DAO;

use App\Models\VeiculoModel;

class VeiculosDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllVeiculos(): array
    {
        $veiculos = $this->pdo
            ->query('SELECT * FROM loc_veiculos;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $veiculos;
    }

    public function insertVeiculo(VeiculoModel $veiculo): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO loc_veiculos (vei_id,vei_descricao,vei_marca,vei_placa,vei_chassi,vei_cor) VALUES(
                null,
                :vei_descricao,
                :vei_marca,
                :vei_placa,
                :vei_chassi,
                :vei_cor
            );');
        $statement->execute([
            'vei_descricao' => $veiculo->getVei_descricao(),
            'vei_marca' => $veiculo->getVei_marca(),
            'vei_placa' => $veiculo->getVei_placa(),
            'vei_chassi' => $veiculo->getVei_chassi(),
            'vei_cor' => $veiculo->getVei_cor()
        ]);
    }

    public function updateVeiculo(VeiculoModel $veiculo): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE loc_veiculos SET
                     vei_descricao =:vei_descricao,
                     vei_marca =:vei_marca,
                     vei_placa =:vei_placa,
                     vei_chassi =:vei_chassi,
                     vei_cor =:vei_cor
                WHERE
                vei_id = :vei_id
            ;');
        $statement->execute([
            'vei_descricao' => $veiculo->getVei_descricao(),
            'vei_marca' => $veiculo->getVei_marca(),
            'vei_placa' => $veiculo->getVei_placa(),
            'vei_chassi' => $veiculo->getVei_chassi(),
            'vei_cor' => $veiculo->getVei_cor(),
            'vei_id' => $veiculo->getVei_id()
        ]);
    }

    public function deleteVeiculo(int $vei_id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM loc_clientes WHERE vei_id = :vei_id;
                DELETE FROM loc_veiculos WHERE vei_id = :vei_id;
            ');
        $statement->execute([
            'vei_id' => $vei_id
        ]);
    }
    public function alugarVeiculo(int $vei_id,int $per_id): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE loc_veiculos SET vei_status = "U" WHERE vei_id = :vei_id;
                INSERT INTO loc_clientes (`per_id`, `vei_id`) VALUES (:per_id, :vei_id);
            ');
        $statement->execute([
            'vei_id' => $vei_id,
            'per_id' => $per_id
        ]);
    }
}