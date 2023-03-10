<?php

return [
    'exclude_tables' => [
        'autonumberingscheme',
        'autonumsch_coll',
        'autonumsch_div',
        'autonumsch_dsp',
        'aux_highergeography',
        'aux_highergeography_test',
        'aux_highertaxonomy',
        'aux_highertaxonomy_test',
        'aux_island',
        'avh_darwin_core_mapping',
        'bionomia_attributions',
        'countryinfo',
        'django_content_type',
        'django_migrations',
        'django_sessions',
        'genusstorage',
        'geoname',
        'gpi_dataset',
        'gpi_dataset_collectionobject',
        'hibernate_unique_key',
        'ios_colobjagents',
        'ios_colobjbio',
        'ios_colobjchron',
        'ios_colobjcnts',
        'ios_colobjgeo',
        'ios_colobjlitho',
        'ios_geogeo_cnt',
        'ios_geogeo_cty',
        'ios_geoloc',
        'ios_geoloc_cnt',
        'ios_geoloc_cty',
        'ios_taxon_pid',
        'kosher_coordinates',
        'mel_avh_agent_action_extension',
        'mel_avh_multimedia',
        'mel_avh_occurrence_core',
        'mel_avh_occurrence_core_agent_id',
        'mel_avh_occurrence_core_test',
        'mel_deleted',
        'mel_recataloguenumbered',
        'melnumbers',
        'migrations',
        'notifications_message',
        'numbers',
        'project_colobj',
        'sgrbatchmatchresultitem',
        'sgrbatchmatchresultset',
        'sgrmatchconfiguration',
        'sp_schema_mapping',
        'spappresource',
        'spappresourcedata',
        'spappresourcedir',
        'spauditlog',
        'spauditlogfield',
        'specifyuser_spprincipal',
        'spexportschema',
        'spexportschemaitem',
        'spexportschemaitemmapping',
        'spexportschemamapping',
        'spfieldvaluedefault',
        'splocalecontainer',
        'splocalecontaineritem',
        'splocaleitemstr',
        'sppermission',
        'spprincipal',
        'spprincipal_sppermission',
        'spquery',
        'spqueryfield',
        'spreport',
        'spschema_field',
        'spschema_form',
        'spschema_formfield',
        'spschema_index',
        'spschema_relationship',
        'spschema_table',
        'spsymbiotainstance',
        'sptasksemaphore',
        'spversion',
        'spviewsetobj',
        'spvisualquery',
        'vicgrid',
        'workbench',
        'workbenchdataitem',
        'workbenchrow',
        'workbenchrowexportedrelationship',
        'workbenchrowimage',
        'workbenchtemplate',
        'workbenchtemplatemappingitem',
    ],

    'types' => [],

    'data_type_mapping_orm' => [
        'int' => 'int',
        'datetime' => 'string',
        'varchar' => 'string',
        'date' => 'string',
        'float' => 'float',
        'text' => 'string',
        'decimal' => 'float',
        'bit' => 'boolean',
        'tinyint' => 'int',
        'smallint' => 'int',
        'double' => 'float',
        'timestamp' => 'int',
        'char' => 'string',
        'bigint' => 'int',
        'longtext' => 'string',
        'mediumblob' => 'string',
        'mediumtext' => 'string',
    ],

    'data_type_mapping_graphql' => [
        'int' => 'Int',
        'datetime' => 'DateTime',
        'varchar' => 'String',
        'date' => 'Date',
        'float' => 'Float',
        'text' => 'String',
        'decimal' => 'Float',
        'bit' => 'Boolean',
        'tinyint' => 'Int',
        'smallint' => 'Int',
        'double' => 'Float',
        'timestamp' => 'Int',
        'char' => 'String',
        'bigint' => 'Int',
        'longtext' => 'String',
        'mediumblob' => 'String',
        'mediumtext' => 'String',
    ],

    'searchable_tables' => [
        'accession',
        'accessionagent',
        'accessionattachment',
        'accessionauthorization',
        'accessioncitation',
        'address',
        'addressofrecord',
        'agent',
        'agentattachment',
        'agentgeography',
        'agentspecialty',
        'agentvariant',
        'appraisal',
        'attachment',
        'attachmentimageattribute',
        'attachmentmetadata',
        'attachmenttag',
        'attributedef',
        'author',
        'borrow',
        'borrowagent',
        'borrowattachment',
        'borrowmaterial',
        'borrowreturnmaterial',
        'collectingevent',
        'collectingeventattachment',
        'collectingeventattribute',
        'collectingeventauthorization',
        'collectingtrip',
        'collectingtripattachment',
        'collectingtripattribute',
        'collectingtripauthorization',
        'collection',
        'collectionobject',
        'collectionobjectattachment',
        'collectionobjectattribute',
        'collectionobjectcitation',
        'collectionobjectproperty',
        'collector',
        'commonnametx',
        'commonnametxcitation',
        'conservdescription',
        'conservdescriptionattachment',
        'conservevent',
        'conserveventattachment',
        'deaccession',
        'deaccessionagent',
        'deaccessionpreparation',
        'determination',
        'determinationcitation',
        'discipline',
        'division',
        'dnaprimer',
        'dnasequence',
        'dnasequenceattachment',
        'dnasequencerunattachment',
        'dnasequencingrun',
        'dnasequencingruncitation',
        'exchangein',
        'exchangeinprep',
        'exchangeout',
        'exchangeoutprep',
        'exsiccata',
        'exsiccataitem',
        'extractor',
        'fieldnotebook',
        'fieldnotebookattachment',
        'fieldnotebookpage',
        'fieldnotebookpageattachment',
        'fieldnotebookpageset',
        'fieldnotebookpagesetattachment',
        'fundingagent',
        'genusstorage',
        'geocoorddetail',
        'geography',
        'geographytreedef',
        'geographytreedefitem',
        'geologictimeperiod',
        'geologictimeperiodtreedef',
        'geologictimeperiodtreedefitem',
        'gift',
        'giftagent',
        'giftattachment',
        'giftpreparation',
        'groupperson',
        'inforequest',
        'institution',
        'institutionnetwork',
        'journal',
        'latlonpolygon',
        'latlonpolygonpnt',
        'lithostrat',
        'lithostrattreedef',
        'lithostrattreedefitem',
        'loan',
        'loanagent',
        'loanattachment',
        'loanpreparation',
        'loanreturnpreparation',
        'locality',
        'localityattachment',
        'localitycitation',
        'localitydetail',
        'localitynamealias',
        'materialsample',
        'otheridentifier',
        'paleocontext',
        'pcrperson',
        'permit',
        'permitattachment',
        'preparation',
        'preparationattachment',
        'preparationattribute',
        'preparationproperty',
        'preptype',
        'project',
        'recordset',
        'recordsetitem',
        'referencework',
        'referenceworkattachment',
        'repositoryagreement',
        'repositoryagreementattachment',
        'shipment',
        'storage',
        'storageattachment',
        'storagetreedef',
        'storagetreedefitem',
        'taxon',
        'taxonattachment',
        'taxonattribute',
        'taxoncitation',
        'taxontreedef',
        'taxontreedefitem',
        'treatmentevent',
        'treatmenteventattachment',
        'collectionobjectattr',
        'preparationattr',
        'disposalpreparation',
        'determiner',
        'exchangeoutattachment',
        'exchangeinattachment',
        'disposal',
        'disposalattachment',
        'deaccessionattachment',
        'disposalagent',
    ],
];
