<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Newspapers Model
 *
 * @method \App\Model\Entity\Newspaper get($primaryKey, $options = [])
 * @method \App\Model\Entity\Newspaper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Newspaper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Newspaper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Newspaper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Newspaper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Newspaper findOrCreate($search, callable $callback = null)
 */
class NewspapersTable extends Table
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

        $this->table('newspapers');
        $this->displayField('id_newspapers');
        $this->primaryKey('id_newspapers');
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
            ->integer('id_newspapers')
            ->allowEmpty('id_newspapers', 'create');

        $validator
            ->integer('id_editors')
            ->requirePresence('id_editors', 'create')
            ->notEmpty('id_editors');

        $validator
            ->integer('id_categories')
            ->requirePresence('id_categories', 'create')
            ->notEmpty('id_categories');

        $validator
            ->integer('id_articles')
            ->requirePresence('id_articles', 'create')
            ->notEmpty('id_articles');

        return $validator;
    }
}
