<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arquivos Model
 *
 * @method \App\Model\Entity\Arquivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arquivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arquivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arquivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo findOrCreate($search, callable $callback = null)
 */
class ArquivosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('arquivos');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('filename', 'create')
            ->notEmpty('filename');

        return $validator;
    }
}
