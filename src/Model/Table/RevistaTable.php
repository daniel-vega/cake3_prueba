<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Revista Model
 *
 * @method \App\Model\Entity\Revistum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Revistum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Revistum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Revistum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Revistum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Revistum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Revistum findOrCreate($search, callable $callback = null)
 */
class RevistaTable extends Table
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

        $this->table('revista');
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
            ->integer('id_category')
            ->requirePresence('id_category', 'create')
            ->notEmpty('id_category');

        $validator
            ->integer('id_article')
            ->requirePresence('id_article', 'create')
            ->notEmpty('id_article');

        return $validator;
    }
}
