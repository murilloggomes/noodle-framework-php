using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_categoria
    public class Mg_categoria
    {
        #region Member Variables
        protected int _id;
        protected string _nome;
        #endregion
        #region Constructors
        public Mg_categoria() { }
        public Mg_categoria(string nome)
        {
            this._nome=nome;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nome
        {
            get {return _nome;}
            set {_nome=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_general_data
    public class Mg_general_data
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected unknown _data;
        #endregion
        #region Constructors
        public Mg_general_data() { }
        public Mg_general_data(string name, unknown data)
        {
            this._name=name;
            this._data=data;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual unknown Data
        {
            get {return _data;}
            set {_data=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_logs
    public class Mg_logs
    {
        #region Member Variables
        protected int _id;
        protected int _id_user;
        protected string _situacao;
        protected string _pagina;
        protected string _detalhes;
        protected DateTime _horas;
        #endregion
        #region Constructors
        public Mg_logs() { }
        public Mg_logs(int id_user, string situacao, string pagina, string detalhes, DateTime horas)
        {
            this._id_user=id_user;
            this._situacao=situacao;
            this._pagina=pagina;
            this._detalhes=detalhes;
            this._horas=horas;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int Id_user
        {
            get {return _id_user;}
            set {_id_user=value;}
        }
        public virtual string Situacao
        {
            get {return _situacao;}
            set {_situacao=value;}
        }
        public virtual string Pagina
        {
            get {return _pagina;}
            set {_pagina=value;}
        }
        public virtual string Detalhes
        {
            get {return _detalhes;}
            set {_detalhes=value;}
        }
        public virtual DateTime Horas
        {
            get {return _horas;}
            set {_horas=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_options
    public class Mg_options
    {
        #region Member Variables
        protected int _id;
        protected string _option_name;
        protected string _option_value;
        #endregion
        #region Constructors
        public Mg_options() { }
        public Mg_options(string option_name, string option_value)
        {
            this._option_name=option_name;
            this._option_value=option_value;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Option_name
        {
            get {return _option_name;}
            set {_option_name=value;}
        }
        public virtual string Option_value
        {
            get {return _option_value;}
            set {_option_value=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_produtos
    public class Mg_produtos
    {
        #region Member Variables
        protected int _id;
        protected string _nome;
        protected string _sku;
        protected string _preco;
        protected int _quantidade;
        protected unknown _categoria;
        protected DateTime _data_criacao;
        #endregion
        #region Constructors
        public Mg_produtos() { }
        public Mg_produtos(string nome, string sku, string preco, int quantidade, unknown categoria, DateTime data_criacao)
        {
            this._nome=nome;
            this._sku=sku;
            this._preco=preco;
            this._quantidade=quantidade;
            this._categoria=categoria;
            this._data_criacao=data_criacao;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nome
        {
            get {return _nome;}
            set {_nome=value;}
        }
        public virtual string Sku
        {
            get {return _sku;}
            set {_sku=value;}
        }
        public virtual string Preco
        {
            get {return _preco;}
            set {_preco=value;}
        }
        public virtual int Quantidade
        {
            get {return _quantidade;}
            set {_quantidade=value;}
        }
        public virtual unknown Categoria
        {
            get {return _categoria;}
            set {_categoria=value;}
        }
        public virtual DateTime Data_criacao
        {
            get {return _data_criacao;}
            set {_data_criacao=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Php
{
    #region Mg_users
    public class Mg_users
    {
        #region Member Variables
        protected int _id;
        protected string _account_type;
        protected string _email;
        protected string _password;
        protected string _firstname;
        protected int _is_active;
        #endregion
        #region Constructors
        public Mg_users() { }
        public Mg_users(string account_type, string email, string password, string firstname, int is_active)
        {
            this._account_type=account_type;
            this._email=email;
            this._password=password;
            this._firstname=firstname;
            this._is_active=is_active;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Account_type
        {
            get {return _account_type;}
            set {_account_type=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Firstname
        {
            get {return _firstname;}
            set {_firstname=value;}
        }
        public virtual int Is_active
        {
            get {return _is_active;}
            set {_is_active=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__bookmark
    public class Pma__bookmark
    {
        #region Member Variables
        protected int _id;
        protected string _dbase;
        protected string _user;
        protected string _label;
        protected string _query;
        #endregion
        #region Constructors
        public Pma__bookmark() { }
        public Pma__bookmark(string dbase, string user, string label, string query)
        {
            this._dbase=dbase;
            this._user=user;
            this._label=label;
            this._query=query;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Dbase
        {
            get {return _dbase;}
            set {_dbase=value;}
        }
        public virtual string User
        {
            get {return _user;}
            set {_user=value;}
        }
        public virtual string Label
        {
            get {return _label;}
            set {_label=value;}
        }
        public virtual string Query
        {
            get {return _query;}
            set {_query=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__central_columns
    public class Pma__central_columns
    {
        #region Member Variables
        protected string _db_name;
        protected string _col_name;
        protected string _col_type;
        protected string _col_length;
        protected string _col_collation;
        protected bool _col_isNull;
        protected string _col_extra;
        protected string _col_default;
        #endregion
        #region Constructors
        public Pma__central_columns() { }
        public Pma__central_columns(string col_type, string col_length, string col_collation, bool col_isNull, string col_extra, string col_default)
        {
            this._col_type=col_type;
            this._col_length=col_length;
            this._col_collation=col_collation;
            this._col_isNull=col_isNull;
            this._col_extra=col_extra;
            this._col_default=col_default;
        }
        #endregion
        #region Public Properties
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Col_name
        {
            get {return _col_name;}
            set {_col_name=value;}
        }
        public virtual string Col_type
        {
            get {return _col_type;}
            set {_col_type=value;}
        }
        public virtual string Col_length
        {
            get {return _col_length;}
            set {_col_length=value;}
        }
        public virtual string Col_collation
        {
            get {return _col_collation;}
            set {_col_collation=value;}
        }
        public virtual bool Col_isNull
        {
            get {return _col_isNull;}
            set {_col_isNull=value;}
        }
        public virtual string Col_extra
        {
            get {return _col_extra;}
            set {_col_extra=value;}
        }
        public virtual string Col_default
        {
            get {return _col_default;}
            set {_col_default=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__column_info
    public class Pma__column_info
    {
        #region Member Variables
        protected int _id;
        protected string _db_name;
        protected string _table_name;
        protected string _column_name;
        protected string _comment;
        protected string _mimetype;
        protected string _transformation;
        protected string _transformation_options;
        protected string _input_transformation;
        protected string _input_transformation_options;
        #endregion
        #region Constructors
        public Pma__column_info() { }
        public Pma__column_info(string db_name, string table_name, string column_name, string comment, string mimetype, string transformation, string transformation_options, string input_transformation, string input_transformation_options)
        {
            this._db_name=db_name;
            this._table_name=table_name;
            this._column_name=column_name;
            this._comment=comment;
            this._mimetype=mimetype;
            this._transformation=transformation;
            this._transformation_options=transformation_options;
            this._input_transformation=input_transformation;
            this._input_transformation_options=input_transformation_options;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        public virtual string Column_name
        {
            get {return _column_name;}
            set {_column_name=value;}
        }
        public virtual string Comment
        {
            get {return _comment;}
            set {_comment=value;}
        }
        public virtual string Mimetype
        {
            get {return _mimetype;}
            set {_mimetype=value;}
        }
        public virtual string Transformation
        {
            get {return _transformation;}
            set {_transformation=value;}
        }
        public virtual string Transformation_options
        {
            get {return _transformation_options;}
            set {_transformation_options=value;}
        }
        public virtual string Input_transformation
        {
            get {return _input_transformation;}
            set {_input_transformation=value;}
        }
        public virtual string Input_transformation_options
        {
            get {return _input_transformation_options;}
            set {_input_transformation_options=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__designer_settings
    public class Pma__designer_settings
    {
        #region Member Variables
        protected string _username;
        protected string _settings_data;
        #endregion
        #region Constructors
        public Pma__designer_settings() { }
        public Pma__designer_settings(string settings_data)
        {
            this._settings_data=settings_data;
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Settings_data
        {
            get {return _settings_data;}
            set {_settings_data=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__export_templates
    public class Pma__export_templates
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _export_type;
        protected string _template_name;
        protected string _template_data;
        #endregion
        #region Constructors
        public Pma__export_templates() { }
        public Pma__export_templates(string username, string export_type, string template_name, string template_data)
        {
            this._username=username;
            this._export_type=export_type;
            this._template_name=template_name;
            this._template_data=template_data;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Export_type
        {
            get {return _export_type;}
            set {_export_type=value;}
        }
        public virtual string Template_name
        {
            get {return _template_name;}
            set {_template_name=value;}
        }
        public virtual string Template_data
        {
            get {return _template_data;}
            set {_template_data=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__favorite
    public class Pma__favorite
    {
        #region Member Variables
        protected string _username;
        protected string _tables;
        #endregion
        #region Constructors
        public Pma__favorite() { }
        public Pma__favorite(string tables)
        {
            this._tables=tables;
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Tables
        {
            get {return _tables;}
            set {_tables=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__history
    public class Pma__history
    {
        #region Member Variables
        protected unknown _id;
        protected string _username;
        protected string _db;
        protected string _table;
        protected unknown _timevalue;
        protected string _sqlquery;
        #endregion
        #region Constructors
        public Pma__history() { }
        public Pma__history(string username, string db, string table, unknown timevalue, string sqlquery)
        {
            this._username=username;
            this._db=db;
            this._table=table;
            this._timevalue=timevalue;
            this._sqlquery=sqlquery;
        }
        #endregion
        #region Public Properties
        public virtual unknown Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Db
        {
            get {return _db;}
            set {_db=value;}
        }
        public virtual string Table
        {
            get {return _table;}
            set {_table=value;}
        }
        public virtual unknown Timevalue
        {
            get {return _timevalue;}
            set {_timevalue=value;}
        }
        public virtual string Sqlquery
        {
            get {return _sqlquery;}
            set {_sqlquery=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__navigationhiding
    public class Pma__navigationhiding
    {
        #region Member Variables
        protected string _username;
        protected string _item_name;
        protected string _item_type;
        protected string _db_name;
        protected string _table_name;
        #endregion
        #region Constructors
        public Pma__navigationhiding() { }
        public Pma__navigationhiding()
        {
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Item_name
        {
            get {return _item_name;}
            set {_item_name=value;}
        }
        public virtual string Item_type
        {
            get {return _item_type;}
            set {_item_type=value;}
        }
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__pdf_pages
    public class Pma__pdf_pages
    {
        #region Member Variables
        protected string _db_name;
        protected int _page_nr;
        protected string _page_descr;
        #endregion
        #region Constructors
        public Pma__pdf_pages() { }
        public Pma__pdf_pages(string db_name, string page_descr)
        {
            this._db_name=db_name;
            this._page_descr=page_descr;
        }
        #endregion
        #region Public Properties
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual int Page_nr
        {
            get {return _page_nr;}
            set {_page_nr=value;}
        }
        public virtual string Page_descr
        {
            get {return _page_descr;}
            set {_page_descr=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__recent
    public class Pma__recent
    {
        #region Member Variables
        protected string _username;
        protected string _tables;
        #endregion
        #region Constructors
        public Pma__recent() { }
        public Pma__recent(string tables)
        {
            this._tables=tables;
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Tables
        {
            get {return _tables;}
            set {_tables=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__relation
    public class Pma__relation
    {
        #region Member Variables
        protected string _master_db;
        protected string _master_table;
        protected string _master_field;
        protected string _foreign_db;
        protected string _foreign_table;
        protected string _foreign_field;
        #endregion
        #region Constructors
        public Pma__relation() { }
        public Pma__relation(string foreign_db, string foreign_table, string foreign_field)
        {
            this._foreign_db=foreign_db;
            this._foreign_table=foreign_table;
            this._foreign_field=foreign_field;
        }
        #endregion
        #region Public Properties
        public virtual string Master_db
        {
            get {return _master_db;}
            set {_master_db=value;}
        }
        public virtual string Master_table
        {
            get {return _master_table;}
            set {_master_table=value;}
        }
        public virtual string Master_field
        {
            get {return _master_field;}
            set {_master_field=value;}
        }
        public virtual string Foreign_db
        {
            get {return _foreign_db;}
            set {_foreign_db=value;}
        }
        public virtual string Foreign_table
        {
            get {return _foreign_table;}
            set {_foreign_table=value;}
        }
        public virtual string Foreign_field
        {
            get {return _foreign_field;}
            set {_foreign_field=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__savedsearches
    public class Pma__savedsearches
    {
        #region Member Variables
        protected int _id;
        protected string _username;
        protected string _db_name;
        protected string _search_name;
        protected string _search_data;
        #endregion
        #region Constructors
        public Pma__savedsearches() { }
        public Pma__savedsearches(string username, string db_name, string search_name, string search_data)
        {
            this._username=username;
            this._db_name=db_name;
            this._search_name=search_name;
            this._search_data=search_data;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Search_name
        {
            get {return _search_name;}
            set {_search_name=value;}
        }
        public virtual string Search_data
        {
            get {return _search_data;}
            set {_search_data=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__table_coords
    public class Pma__table_coords
    {
        #region Member Variables
        protected string _db_name;
        protected string _table_name;
        protected int _pdf_page_number;
        protected unknown _x;
        protected unknown _y;
        #endregion
        #region Constructors
        public Pma__table_coords() { }
        public Pma__table_coords(unknown x, unknown y)
        {
            this._x=x;
            this._y=y;
        }
        #endregion
        #region Public Properties
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        public virtual int Pdf_page_number
        {
            get {return _pdf_page_number;}
            set {_pdf_page_number=value;}
        }
        public virtual unknown X
        {
            get {return _x;}
            set {_x=value;}
        }
        public virtual unknown Y
        {
            get {return _y;}
            set {_y=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__table_info
    public class Pma__table_info
    {
        #region Member Variables
        protected string _db_name;
        protected string _table_name;
        protected string _display_field;
        #endregion
        #region Constructors
        public Pma__table_info() { }
        public Pma__table_info(string display_field)
        {
            this._display_field=display_field;
        }
        #endregion
        #region Public Properties
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        public virtual string Display_field
        {
            get {return _display_field;}
            set {_display_field=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__table_uiprefs
    public class Pma__table_uiprefs
    {
        #region Member Variables
        protected string _username;
        protected string _db_name;
        protected string _table_name;
        protected string _prefs;
        protected unknown _last_update;
        #endregion
        #region Constructors
        public Pma__table_uiprefs() { }
        public Pma__table_uiprefs(string prefs, unknown last_update)
        {
            this._prefs=prefs;
            this._last_update=last_update;
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        public virtual string Prefs
        {
            get {return _prefs;}
            set {_prefs=value;}
        }
        public virtual unknown Last_update
        {
            get {return _last_update;}
            set {_last_update=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__tracking
    public class Pma__tracking
    {
        #region Member Variables
        protected string _db_name;
        protected string _table_name;
        protected int _version;
        protected DateTime _date_created;
        protected DateTime _date_updated;
        protected string _schema_snapshot;
        protected string _schema_sql;
        protected string _data_sql;
        protected unknown _tracking;
        protected int _tracking_active;
        #endregion
        #region Constructors
        public Pma__tracking() { }
        public Pma__tracking(DateTime date_created, DateTime date_updated, string schema_snapshot, string schema_sql, string data_sql, unknown tracking, int tracking_active)
        {
            this._date_created=date_created;
            this._date_updated=date_updated;
            this._schema_snapshot=schema_snapshot;
            this._schema_sql=schema_sql;
            this._data_sql=data_sql;
            this._tracking=tracking;
            this._tracking_active=tracking_active;
        }
        #endregion
        #region Public Properties
        public virtual string Db_name
        {
            get {return _db_name;}
            set {_db_name=value;}
        }
        public virtual string Table_name
        {
            get {return _table_name;}
            set {_table_name=value;}
        }
        public virtual int Version
        {
            get {return _version;}
            set {_version=value;}
        }
        public virtual DateTime Date_created
        {
            get {return _date_created;}
            set {_date_created=value;}
        }
        public virtual DateTime Date_updated
        {
            get {return _date_updated;}
            set {_date_updated=value;}
        }
        public virtual string Schema_snapshot
        {
            get {return _schema_snapshot;}
            set {_schema_snapshot=value;}
        }
        public virtual string Schema_sql
        {
            get {return _schema_sql;}
            set {_schema_sql=value;}
        }
        public virtual string Data_sql
        {
            get {return _data_sql;}
            set {_data_sql=value;}
        }
        public virtual unknown Tracking
        {
            get {return _tracking;}
            set {_tracking=value;}
        }
        public virtual int Tracking_active
        {
            get {return _tracking_active;}
            set {_tracking_active=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__userconfig
    public class Pma__userconfig
    {
        #region Member Variables
        protected string _username;
        protected unknown _timevalue;
        protected string _config_data;
        #endregion
        #region Constructors
        public Pma__userconfig() { }
        public Pma__userconfig(unknown timevalue, string config_data)
        {
            this._timevalue=timevalue;
            this._config_data=config_data;
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual unknown Timevalue
        {
            get {return _timevalue;}
            set {_timevalue=value;}
        }
        public virtual string Config_data
        {
            get {return _config_data;}
            set {_config_data=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__usergroups
    public class Pma__usergroups
    {
        #region Member Variables
        protected string _usergroup;
        protected string _tab;
        protected unknown _allowed;
        #endregion
        #region Constructors
        public Pma__usergroups() { }
        public Pma__usergroups()
        {
        }
        #endregion
        #region Public Properties
        public virtual string Usergroup
        {
            get {return _usergroup;}
            set {_usergroup=value;}
        }
        public virtual string Tab
        {
            get {return _tab;}
            set {_tab=value;}
        }
        public virtual unknown Allowed
        {
            get {return _allowed;}
            set {_allowed=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Phpmyadmin
{
    #region Pma__users
    public class Pma__users
    {
        #region Member Variables
        protected string _username;
        protected string _usergroup;
        #endregion
        #region Constructors
        public Pma__users() { }
        public Pma__users()
        {
        }
        #endregion
        #region Public Properties
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Usergroup
        {
            get {return _usergroup;}
            set {_usergroup=value;}
        }
        #endregion
    }
    #endregion
}