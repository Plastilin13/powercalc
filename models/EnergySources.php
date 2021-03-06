<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "EnergySources".
 *
 * @property int $id
 * @property string $name Название источника энергии ["ГС1", "ЛГС3", "ЭС1"]
 * @property int $energySourceType_id Является ли электросистемой
 * @property double $qMax Qmax для расчёта Q располагаемого
 * @property double $pumpPressureNominal Pнас ном
 * @property double $pumpPressureWorkQmax Pнас раб при Qmax
 *
 * @property Energysourcetypes $energySourceType
 */
class EnergySources extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'EnergySources';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'energySourceType_id'], 'required'],
            [['energySourceType_id'], 'integer'],
            [['qMax', 'pumpPressureNominal', 'pumpPressureWorkQmax'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['energySourceType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Energysourcetypes::className(), 'targetAttribute' => ['energySourceType_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'energySourceType_id' => 'Тип энергосистемы',
            'qMax' => 'Q max',
            'pumpPressureNominal' => 'Pнас ном',
            'pumpPressureWorkQmax' => 'Pнас раб при Qmax',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnergySourceType()
    {
        return $this->hasOne(Energysourcetypes::className(), ['id' => 'energySourceType_id']);
    }
}
