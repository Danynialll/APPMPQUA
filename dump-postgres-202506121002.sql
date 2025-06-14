PGDMP          
            }            postgres    17.4    17.0 �    ;           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            <           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            =           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            >           1262    5    postgres    DATABASE     ~   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Malaysia.1252';
    DROP DATABASE postgres;
                     User    false            ?           0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                        User    false    5182                        2615    16391    qvc_upsi    SCHEMA        CREATE SCHEMA qvc_upsi;
    DROP SCHEMA qvc_upsi;
                     postgres    false            �           1247    16402    qu_type_enum    TYPE     �   CREATE TYPE qvc_upsi.qu_type_enum AS ENUM (
    'Public University',
    'Private University',
    'Polytechnic',
    'University College',
    'Community College',
    'TVET Institute',
    'Matriculation College'
);
 !   DROP TYPE qvc_upsi.qu_type_enum;
       qvc_upsi               postgres    false    6            �            1259    16702    asr_nec_mapping    TABLE     ;  CREATE TABLE qvc_upsi.asr_nec_mapping (
    anm_id integer NOT NULL,
    anm_asr_id integer NOT NULL,
    anm_nd_id integer NOT NULL,
    anm_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    anm_updated_at timestamp without time zone,
    anm_deleted_at timestamp without time zone
);
 %   DROP TABLE qvc_upsi.asr_nec_mapping;
       qvc_upsi         heap r       postgres    false    6            �            1259    16701    asr_nec_mapping_anm_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.asr_nec_mapping_anm_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE qvc_upsi.asr_nec_mapping_anm_id_seq;
       qvc_upsi               postgres    false    255    6            @           0    0    asr_nec_mapping_anm_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE qvc_upsi.asr_nec_mapping_anm_id_seq OWNED BY qvc_upsi.asr_nec_mapping.anm_id;
          qvc_upsi               postgres    false    254            �            1259    16429    assessor    TABLE     �  CREATE TABLE qvc_upsi.assessor (
    asr_id integer NOT NULL,
    asr_name character varying(255) NOT NULL,
    asr_email character varying(255) NOT NULL,
    asr_phone character varying(20) NOT NULL,
    asr_service_address text NOT NULL,
    asr_qu_id integer NOT NULL,
    asr_image text,
    asr_verification boolean DEFAULT false NOT NULL,
    asr_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    asr_updated_at timestamp without time zone,
    asr_deleted_at timestamp without time zone,
    asr_fax character varying,
    asr_retirement_date date,
    asr_gender character varying,
    asr_cv_path character varying
);
    DROP TABLE qvc_upsi.assessor;
       qvc_upsi         heap r       postgres    false    6            �            1259    16428    assessor_asr_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.assessor_asr_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE qvc_upsi.assessor_asr_id_seq;
       qvc_upsi               postgres    false    223    6            A           0    0    assessor_asr_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE qvc_upsi.assessor_asr_id_seq OWNED BY qvc_upsi.assessor.asr_id;
          qvc_upsi               postgres    false    222            �            1259    16562    assessor_expertise_field    TABLE     D  CREATE TABLE qvc_upsi.assessor_expertise_field (
    aef_id integer NOT NULL,
    aef_asr_id integer NOT NULL,
    aef_ef_id integer NOT NULL,
    aef_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    aef_updated_at timestamp without time zone,
    aef_deleted_at timestamp without time zone
);
 .   DROP TABLE qvc_upsi.assessor_expertise_field;
       qvc_upsi         heap r       postgres    false    6            �            1259    16561 #   assessor_expertise_field_aef_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.assessor_expertise_field_aef_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE qvc_upsi.assessor_expertise_field_aef_id_seq;
       qvc_upsi               postgres    false    6    243            B           0    0 #   assessor_expertise_field_aef_id_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE qvc_upsi.assessor_expertise_field_aef_id_seq OWNED BY qvc_upsi.assessor_expertise_field.aef_id;
          qvc_upsi               postgres    false    242            �            1259    16483    auth_groups    TABLE     A  CREATE TABLE qvc_upsi.auth_groups (
    ag_id integer NOT NULL,
    ag_name character varying(255) NOT NULL,
    ag_description text NOT NULL,
    ag_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    ag_updated_at timestamp without time zone,
    ag_deleted_at timestamp without time zone
);
 !   DROP TABLE qvc_upsi.auth_groups;
       qvc_upsi         heap r       postgres    false    6            �            1259    16482    auth_groups_ag_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.auth_groups_ag_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE qvc_upsi.auth_groups_ag_id_seq;
       qvc_upsi               postgres    false    231    6            C           0    0    auth_groups_ag_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE qvc_upsi.auth_groups_ag_id_seq OWNED BY qvc_upsi.auth_groups.ag_id;
          qvc_upsi               postgres    false    230            �            1259    16503    auth_groups_user    TABLE     @  CREATE TABLE qvc_upsi.auth_groups_user (
    agu_id integer NOT NULL,
    agu_group_id integer NOT NULL,
    agu_user_id integer NOT NULL,
    agu_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    agu_updated_at timestamp without time zone,
    agu_deleted_at timestamp without time zone
);
 &   DROP TABLE qvc_upsi.auth_groups_user;
       qvc_upsi         heap r       postgres    false    6            �            1259    16502    auth_groups_user_agu_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.auth_groups_user_agu_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE qvc_upsi.auth_groups_user_agu_id_seq;
       qvc_upsi               postgres    false    6    235            D           0    0    auth_groups_user_agu_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE qvc_upsi.auth_groups_user_agu_id_seq OWNED BY qvc_upsi.auth_groups_user.agu_id;
          qvc_upsi               postgres    false    234            �            1259    16493 	   auth_user    TABLE     �  CREATE TABLE qvc_upsi.auth_user (
    au_id integer NOT NULL,
    au_user_id integer,
    au_username character varying(255) NOT NULL,
    au_password text NOT NULL,
    au_type character varying(50) NOT NULL,
    au_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    au_updated_at timestamp without time zone,
    au_deleted_at timestamp without time zone,
    au_qu_id integer,
    au_plain_password character varying
);
    DROP TABLE qvc_upsi.auth_user;
       qvc_upsi         heap r       postgres    false    6            �            1259    16492    auth_user_au_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.auth_user_au_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE qvc_upsi.auth_user_au_id_seq;
       qvc_upsi               postgres    false    6    233            E           0    0    auth_user_au_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE qvc_upsi.auth_user_au_id_seq OWNED BY qvc_upsi.auth_user.au_id;
          qvc_upsi               postgres    false    232            �            1259    16615    course_content_outline    TABLE     ?  CREATE TABLE qvc_upsi.course_content_outline (
    cco_id integer NOT NULL,
    cco_samc_id integer NOT NULL,
    cco_desc text NOT NULL,
    cco_clo character varying(255) NOT NULL,
    cco_presentation integer,
    cco_tutorial integer,
    cco_practical integer,
    cco_others integer,
    cco_instruction_learning_hour integer NOT NULL,
    cco_independent_learning_hour integer NOT NULL,
    cco_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    cco_updated_at timestamp without time zone,
    cco_deleted_at timestamp without time zone
);
 ,   DROP TABLE qvc_upsi.course_content_outline;
       qvc_upsi         heap r       postgres    false    6            �            1259    16614 !   course_content_outline_cco_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.course_content_outline_cco_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE qvc_upsi.course_content_outline_cco_id_seq;
       qvc_upsi               postgres    false    249    6            F           0    0 !   course_content_outline_cco_id_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE qvc_upsi.course_content_outline_cco_id_seq OWNED BY qvc_upsi.course_content_outline.cco_id;
          qvc_upsi               postgres    false    248            �            1259    16473    expertise_field    TABLE       CREATE TABLE qvc_upsi.expertise_field (
    ef_id integer NOT NULL,
    ef_desc text NOT NULL,
    ef_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    ef_updated_at timestamp without time zone,
    ef_deleted_at timestamp without time zone
);
 %   DROP TABLE qvc_upsi.expertise_field;
       qvc_upsi         heap r       postgres    false    6            �            1259    16472    expertise_field_ef_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.expertise_field_ef_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE qvc_upsi.expertise_field_ef_id_seq;
       qvc_upsi               postgres    false    229    6            G           0    0    expertise_field_ef_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE qvc_upsi.expertise_field_ef_id_seq OWNED BY qvc_upsi.expertise_field.ef_id;
          qvc_upsi               postgres    false    228            �            1259    16393 
   migrations    TABLE     *  CREATE TABLE qvc_upsi.migrations (
    id bigint NOT NULL,
    version character varying(255) NOT NULL,
    class character varying(255) NOT NULL,
    "group" character varying(255) NOT NULL,
    namespace character varying(255) NOT NULL,
    "time" integer NOT NULL,
    batch integer NOT NULL
);
     DROP TABLE qvc_upsi.migrations;
       qvc_upsi         heap r       postgres    false    6            �            1259    16392    migrations_id_seq    SEQUENCE     |   CREATE SEQUENCE qvc_upsi.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE qvc_upsi.migrations_id_seq;
       qvc_upsi               postgres    false    219    6            H           0    0    migrations_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE qvc_upsi.migrations_id_seq OWNED BY qvc_upsi.migrations.id;
          qvc_upsi               postgres    false    218                       1259    16816    mpqua    TABLE     �  CREATE TABLE qvc_upsi.mpqua (
    mpq_id integer NOT NULL,
    mpq_address character varying,
    mpq_email character varying,
    mpq_phone character varying,
    mpq_fax character varying,
    mpq_qu_id integer,
    mpq_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    mpq_updated_at timestamp without time zone,
    mpq_deleted_at timestamp without time zone
);
    DROP TABLE qvc_upsi.mpqua;
       qvc_upsi         heap r       postgres    false    6            	           1259    16819    mpqua_mpq_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.mpqua_mpq_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE qvc_upsi.mpqua_mpq_id_seq;
       qvc_upsi               postgres    false    6    264            I           0    0    mpqua_mpq_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE qvc_upsi.mpqua_mpq_id_seq OWNED BY qvc_upsi.mpqua.mpq_id;
          qvc_upsi               postgres    false    265                       1259    16759 	   nec_broad    TABLE     @  CREATE TABLE qvc_upsi.nec_broad (
    nb_id integer NOT NULL,
    nb_code character varying NOT NULL,
    nb_name character varying NOT NULL,
    nb_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    nb_updated_at timestamp without time zone,
    nb_deleted_at timestamp without time zone
);
    DROP TABLE qvc_upsi.nec_broad;
       qvc_upsi         heap r       postgres    false    6                        1259    16758    nec_broad_nb_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.nec_broad_nb_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE qvc_upsi.nec_broad_nb_id_seq;
       qvc_upsi               postgres    false    257    6            J           0    0    nec_broad_nb_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE qvc_upsi.nec_broad_nb_id_seq OWNED BY qvc_upsi.nec_broad.nb_id;
          qvc_upsi               postgres    false    256                       1259    16791 
   nec_detail    TABLE     `  CREATE TABLE qvc_upsi.nec_detail (
    nd_id integer NOT NULL,
    nd_nn_id integer NOT NULL,
    nd_code character varying NOT NULL,
    nd_name character varying NOT NULL,
    nd_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    nd_updated_at timestamp without time zone,
    nd_deleted_at timestamp without time zone
);
     DROP TABLE qvc_upsi.nec_detail;
       qvc_upsi         heap r       postgres    false    6                       1259    16789    nec_detail_nd_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.nec_detail_nd_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE qvc_upsi.nec_detail_nd_id_seq;
       qvc_upsi               postgres    false    6    263            K           0    0    nec_detail_nd_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE qvc_upsi.nec_detail_nd_id_seq OWNED BY qvc_upsi.nec_detail.nd_id;
          qvc_upsi               postgres    false    261                       1259    16790    nec_detail_nd_nn_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.nec_detail_nd_nn_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE qvc_upsi.nec_detail_nd_nn_id_seq;
       qvc_upsi               postgres    false    6    263            L           0    0    nec_detail_nd_nn_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE qvc_upsi.nec_detail_nd_nn_id_seq OWNED BY qvc_upsi.nec_detail.nd_nn_id;
          qvc_upsi               postgres    false    262                       1259    16772 
   nec_narrow    TABLE     `  CREATE TABLE qvc_upsi.nec_narrow (
    nn_id integer NOT NULL,
    nn_nb_id integer NOT NULL,
    nn_code character varying NOT NULL,
    nn_name character varying NOT NULL,
    nn_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    nn_updated_at timestamp without time zone,
    nn_deleted_at timestamp without time zone
);
     DROP TABLE qvc_upsi.nec_narrow;
       qvc_upsi         heap r       postgres    false    6                       1259    16770    nec_narrow_nn_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.nec_narrow_nn_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE qvc_upsi.nec_narrow_nn_id_seq;
       qvc_upsi               postgres    false    6    260            M           0    0    nec_narrow_nn_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE qvc_upsi.nec_narrow_nn_id_seq OWNED BY qvc_upsi.nec_narrow.nn_id;
          qvc_upsi               postgres    false    258                       1259    16771    nec_narrow_nn_nb_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.nec_narrow_nn_nb_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE qvc_upsi.nec_narrow_nn_nb_id_seq;
       qvc_upsi               postgres    false    260    6            N           0    0    nec_narrow_nn_nb_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE qvc_upsi.nec_narrow_nn_nb_id_seq OWNED BY qvc_upsi.nec_narrow.nn_nb_id;
          qvc_upsi               postgres    false    259            �            1259    16551    notifications    TABLE     �  CREATE TABLE qvc_upsi.notifications (
    n_id integer NOT NULL,
    n_user_id integer NOT NULL,
    n_user_type character varying(50) NOT NULL,
    n_title character varying(255) NOT NULL,
    n_message text NOT NULL,
    n_type character varying(50),
    n_url text,
    n_is_read boolean DEFAULT false NOT NULL,
    n_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    n_updated_at timestamp without time zone,
    n_deleted_at timestamp without time zone
);
 #   DROP TABLE qvc_upsi.notifications;
       qvc_upsi         heap r       postgres    false    6            �            1259    16550    notifications_n_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.notifications_n_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE qvc_upsi.notifications_n_id_seq;
       qvc_upsi               postgres    false    6    241            O           0    0    notifications_n_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE qvc_upsi.notifications_n_id_seq OWNED BY qvc_upsi.notifications.n_id;
          qvc_upsi               postgres    false    240            �            1259    16447    provider    TABLE     y  CREATE TABLE qvc_upsi.provider (
    pvd_id integer NOT NULL,
    pvd_name character varying(255) NOT NULL,
    pvd_email character varying(255) NOT NULL,
    pvd_ssm_number character varying(50) NOT NULL,
    pvd_ssm_cert text,
    pvd_type character varying(100) NOT NULL,
    pvd_address text NOT NULL,
    pvd_doe date NOT NULL,
    pvd_phone character varying(20) NOT NULL,
    pvd_verification boolean DEFAULT false NOT NULL,
    pvd_image text,
    pvd_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    pvd_updated_at timestamp without time zone,
    pvd_deleted_at timestamp without time zone
);
    DROP TABLE qvc_upsi.provider;
       qvc_upsi         heap r       postgres    false    6            �            1259    16446    provider_pvd_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.provider_pvd_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE qvc_upsi.provider_pvd_id_seq;
       qvc_upsi               postgres    false    225    6            P           0    0    provider_pvd_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE qvc_upsi.provider_pvd_id_seq OWNED BY qvc_upsi.provider.pvd_id;
          qvc_upsi               postgres    false    224            �            1259    16460 	   qvc_admin    TABLE     "  CREATE TABLE qvc_upsi.qvc_admin (
    qa_id integer NOT NULL,
    qa_name character varying(255) NOT NULL,
    qa_email character varying(255) NOT NULL,
    qa_start_date date NOT NULL,
    qa_expired_date date NOT NULL,
    qa_qu_id integer NOT NULL,
    qa_level character varying(50) NOT NULL,
    qa_verification boolean DEFAULT false NOT NULL,
    qa_image text,
    qa_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    qa_updated_at timestamp without time zone,
    qa_deleted_at timestamp without time zone
);
    DROP TABLE qvc_upsi.qvc_admin;
       qvc_upsi         heap r       postgres    false    6            �            1259    16459    qvc_admin_qa_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.qvc_admin_qa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE qvc_upsi.qvc_admin_qa_id_seq;
       qvc_upsi               postgres    false    6    227            Q           0    0    qvc_admin_qa_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE qvc_upsi.qvc_admin_qa_id_seq OWNED BY qvc_upsi.qvc_admin.qa_id;
          qvc_upsi               postgres    false    226            �            1259    16418    qvc_university    TABLE     �  CREATE TABLE qvc_upsi.qvc_university (
    qu_id integer NOT NULL,
    qu_code character varying(20) NOT NULL,
    qu_name character varying(255) NOT NULL,
    qu_type qvc_upsi.qu_type_enum DEFAULT 'Public University'::qvc_upsi.qu_type_enum NOT NULL,
    qu_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    qu_updated_at timestamp without time zone,
    qu_deleted_at timestamp without time zone
);
 $   DROP TABLE qvc_upsi.qvc_university;
       qvc_upsi         heap r       postgres    false    897    6    897            �            1259    16417    qvc_university_qu_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.qvc_university_qu_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE qvc_upsi.qvc_university_qu_id_seq;
       qvc_upsi               postgres    false    221    6            R           0    0    qvc_university_qu_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE qvc_upsi.qvc_university_qu_id_seq OWNED BY qvc_upsi.qvc_university.qu_id;
          qvc_upsi               postgres    false    220            �            1259    16511    samc    TABLE     �  CREATE TABLE qvc_upsi.samc (
    samc_id integer NOT NULL,
    samc_pvd_id integer NOT NULL,
    samc_asr_id integer,
    samc_course_name character varying(255) NOT NULL,
    samc_mqf_level character varying(50) NOT NULL,
    samc_duration_hours integer NOT NULL,
    samc_language character varying(100) NOT NULL,
    samc_teaching_methods text NOT NULL,
    samc_academic_credits numeric(3,1) NOT NULL,
    samc_prior_knowledge text NOT NULL,
    samc_synopsis text NOT NULL,
    samc_intended_learning_outcomes text NOT NULL,
    samc_instructor character varying(255) NOT NULL,
    samc_ef_id integer NOT NULL,
    samc_status character varying(50) NOT NULL,
    samc_payment_status character varying(50),
    samc_submit_date timestamp without time zone,
    samc_payment_date timestamp without time zone,
    samc_assigned_date timestamp without time zone,
    samc_reviewed_date timestamp without time zone,
    samc_review_count integer,
    samc_start_date timestamp without time zone,
    samc_expired_date timestamp without time zone,
    samc_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    samc_updated_at timestamp without time zone,
    samc_deleted_at timestamp without time zone
);
    DROP TABLE qvc_upsi.samc;
       qvc_upsi         heap r       postgres    false    6            �            1259    16600    samc_assessment    TABLE     �  CREATE TABLE qvc_upsi.samc_assessment (
    sa_id integer NOT NULL,
    sa_samc_id integer NOT NULL,
    sa_desc text NOT NULL,
    sa_type character varying(50) NOT NULL,
    sa_percentage integer NOT NULL,
    sa_instruction_learning_hour integer NOT NULL,
    sa_independent_learning_hour integer NOT NULL,
    sa_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    sa_updated_at timestamp without time zone,
    sa_deleted_at timestamp without time zone
);
 %   DROP TABLE qvc_upsi.samc_assessment;
       qvc_upsi         heap r       postgres    false    6            �            1259    16599    samc_assessment_sa_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_assessment_sa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE qvc_upsi.samc_assessment_sa_id_seq;
       qvc_upsi               postgres    false    6    247            S           0    0    samc_assessment_sa_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE qvc_upsi.samc_assessment_sa_id_seq OWNED BY qvc_upsi.samc_assessment.sa_id;
          qvc_upsi               postgres    false    246            �            1259    16630    samc_payment    TABLE       CREATE TABLE qvc_upsi.samc_payment (
    sp_id integer NOT NULL,
    sp_pvd_id integer NOT NULL,
    sp_invoice_number character varying(50),
    sp_amount numeric(10,2) NOT NULL,
    sp_method character varying(50) NOT NULL,
    sp_status character varying(20) NOT NULL,
    sp_prove text,
    sp_created_at timestamp without time zone NOT NULL,
    sp_updated_at timestamp without time zone,
    sp_deleted_at timestamp without time zone,
    sp_remarks text,
    sp_log text,
    sp_reff_num character varying(50)
);
 "   DROP TABLE qvc_upsi.samc_payment;
       qvc_upsi         heap r       postgres    false    6            �            1259    16644    samc_payment_item    TABLE     $  CREATE TABLE qvc_upsi.samc_payment_item (
    spi_id integer NOT NULL,
    spi_sp_id integer NOT NULL,
    spi_samc_id integer NOT NULL,
    spi_created_at timestamp without time zone NOT NULL,
    spi_updated_at timestamp without time zone,
    spi_deleted_at timestamp without time zone
);
 '   DROP TABLE qvc_upsi.samc_payment_item;
       qvc_upsi         heap r       postgres    false    6            �            1259    16643    samc_payment_item_spi_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_payment_item_spi_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE qvc_upsi.samc_payment_item_spi_id_seq;
       qvc_upsi               postgres    false    253    6            T           0    0    samc_payment_item_spi_id_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE qvc_upsi.samc_payment_item_spi_id_seq OWNED BY qvc_upsi.samc_payment_item.spi_id;
          qvc_upsi               postgres    false    252            �            1259    16629    samc_payment_sp_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_payment_sp_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE qvc_upsi.samc_payment_sp_id_seq;
       qvc_upsi               postgres    false    251    6            U           0    0    samc_payment_sp_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE qvc_upsi.samc_payment_sp_id_seq OWNED BY qvc_upsi.samc_payment.sp_id;
          qvc_upsi               postgres    false    250            �            1259    16580    samc_reject_record    TABLE     �  CREATE TABLE qvc_upsi.samc_reject_record (
    srr_id integer NOT NULL,
    srr_samc_id integer NOT NULL,
    srr_asr_id integer NOT NULL,
    srr_rejection_date timestamp without time zone NOT NULL,
    srr_reason text NOT NULL,
    srr_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    srr_updated_at timestamp without time zone,
    srr_deleted_at timestamp without time zone
);
 (   DROP TABLE qvc_upsi.samc_reject_record;
       qvc_upsi         heap r       postgres    false    6            �            1259    16579    samc_reject_record_srr_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_reject_record_srr_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE qvc_upsi.samc_reject_record_srr_id_seq;
       qvc_upsi               postgres    false    245    6            V           0    0    samc_reject_record_srr_id_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE qvc_upsi.samc_reject_record_srr_id_seq OWNED BY qvc_upsi.samc_reject_record.srr_id;
          qvc_upsi               postgres    false    244            �            1259    16536    samc_review    TABLE     �  CREATE TABLE qvc_upsi.samc_review (
    sr_id integer NOT NULL,
    sr_samc_id integer NOT NULL,
    sr_counter character varying(50) NOT NULL,
    sr_samc_name text NOT NULL,
    sr_samc_name_status character varying(50) NOT NULL,
    sr_mqf_level text NOT NULL,
    sr_mqf_level_status character varying(50) NOT NULL,
    sr_duration_hours text NOT NULL,
    sr_duration_hours_status character varying(50) NOT NULL,
    sr_teaching_methods text NOT NULL,
    sr_teaching_methods_status character varying(50) NOT NULL,
    sr_academic_credits text NOT NULL,
    sr_academic_credits_status character varying(50) NOT NULL,
    sr_synopsis text NOT NULL,
    sr_synopsis_status character varying(50) NOT NULL,
    sr_intended_learning_outcomes text NOT NULL,
    sr_intended_learning_outcomes_status character varying(50) NOT NULL,
    sr_content_outline text NOT NULL,
    sr_content_outline_status character varying(50) NOT NULL,
    sr_assessment text NOT NULL,
    sr_assessment_status character varying(50) NOT NULL,
    sr_review_status character varying(50) NOT NULL,
    sr_created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    sr_updated_at timestamp without time zone,
    sr_deleted_at timestamp without time zone
);
 !   DROP TABLE qvc_upsi.samc_review;
       qvc_upsi         heap r       postgres    false    6            �            1259    16535    samc_review_sr_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_review_sr_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE qvc_upsi.samc_review_sr_id_seq;
       qvc_upsi               postgres    false    239    6            W           0    0    samc_review_sr_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE qvc_upsi.samc_review_sr_id_seq OWNED BY qvc_upsi.samc_review.sr_id;
          qvc_upsi               postgres    false    238            �            1259    16510    samc_samc_id_seq    SEQUENCE     �   CREATE SEQUENCE qvc_upsi.samc_samc_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE qvc_upsi.samc_samc_id_seq;
       qvc_upsi               postgres    false    6    237            X           0    0    samc_samc_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE qvc_upsi.samc_samc_id_seq OWNED BY qvc_upsi.samc.samc_id;
          qvc_upsi               postgres    false    236                        2604    16705    asr_nec_mapping anm_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping ALTER COLUMN anm_id SET DEFAULT nextval('qvc_upsi.asr_nec_mapping_anm_id_seq'::regclass);
 G   ALTER TABLE qvc_upsi.asr_nec_mapping ALTER COLUMN anm_id DROP DEFAULT;
       qvc_upsi               postgres    false    254    255    255            �           2604    16432    assessor asr_id    DEFAULT     v   ALTER TABLE ONLY qvc_upsi.assessor ALTER COLUMN asr_id SET DEFAULT nextval('qvc_upsi.assessor_asr_id_seq'::regclass);
 @   ALTER TABLE qvc_upsi.assessor ALTER COLUMN asr_id DROP DEFAULT;
       qvc_upsi               postgres    false    222    223    223                       2604    16565    assessor_expertise_field aef_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field ALTER COLUMN aef_id SET DEFAULT nextval('qvc_upsi.assessor_expertise_field_aef_id_seq'::regclass);
 P   ALTER TABLE qvc_upsi.assessor_expertise_field ALTER COLUMN aef_id DROP DEFAULT;
       qvc_upsi               postgres    false    243    242    243            	           2604    16486    auth_groups ag_id    DEFAULT     z   ALTER TABLE ONLY qvc_upsi.auth_groups ALTER COLUMN ag_id SET DEFAULT nextval('qvc_upsi.auth_groups_ag_id_seq'::regclass);
 B   ALTER TABLE qvc_upsi.auth_groups ALTER COLUMN ag_id DROP DEFAULT;
       qvc_upsi               postgres    false    230    231    231                       2604    16506    auth_groups_user agu_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.auth_groups_user ALTER COLUMN agu_id SET DEFAULT nextval('qvc_upsi.auth_groups_user_agu_id_seq'::regclass);
 H   ALTER TABLE qvc_upsi.auth_groups_user ALTER COLUMN agu_id DROP DEFAULT;
       qvc_upsi               postgres    false    235    234    235                       2604    16496    auth_user au_id    DEFAULT     v   ALTER TABLE ONLY qvc_upsi.auth_user ALTER COLUMN au_id SET DEFAULT nextval('qvc_upsi.auth_user_au_id_seq'::regclass);
 @   ALTER TABLE qvc_upsi.auth_user ALTER COLUMN au_id DROP DEFAULT;
       qvc_upsi               postgres    false    232    233    233                       2604    16618    course_content_outline cco_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.course_content_outline ALTER COLUMN cco_id SET DEFAULT nextval('qvc_upsi.course_content_outline_cco_id_seq'::regclass);
 N   ALTER TABLE qvc_upsi.course_content_outline ALTER COLUMN cco_id DROP DEFAULT;
       qvc_upsi               postgres    false    249    248    249                       2604    16476    expertise_field ef_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.expertise_field ALTER COLUMN ef_id SET DEFAULT nextval('qvc_upsi.expertise_field_ef_id_seq'::regclass);
 F   ALTER TABLE qvc_upsi.expertise_field ALTER COLUMN ef_id DROP DEFAULT;
       qvc_upsi               postgres    false    229    228    229            �           2604    16396    migrations id    DEFAULT     r   ALTER TABLE ONLY qvc_upsi.migrations ALTER COLUMN id SET DEFAULT nextval('qvc_upsi.migrations_id_seq'::regclass);
 >   ALTER TABLE qvc_upsi.migrations ALTER COLUMN id DROP DEFAULT;
       qvc_upsi               postgres    false    218    219    219            *           2604    16820    mpqua mpq_id    DEFAULT     p   ALTER TABLE ONLY qvc_upsi.mpqua ALTER COLUMN mpq_id SET DEFAULT nextval('qvc_upsi.mpqua_mpq_id_seq'::regclass);
 =   ALTER TABLE qvc_upsi.mpqua ALTER COLUMN mpq_id DROP DEFAULT;
       qvc_upsi               postgres    false    265    264            "           2604    16762    nec_broad nb_id    DEFAULT     v   ALTER TABLE ONLY qvc_upsi.nec_broad ALTER COLUMN nb_id SET DEFAULT nextval('qvc_upsi.nec_broad_nb_id_seq'::regclass);
 @   ALTER TABLE qvc_upsi.nec_broad ALTER COLUMN nb_id DROP DEFAULT;
       qvc_upsi               postgres    false    257    256    257            '           2604    16794    nec_detail nd_id    DEFAULT     x   ALTER TABLE ONLY qvc_upsi.nec_detail ALTER COLUMN nd_id SET DEFAULT nextval('qvc_upsi.nec_detail_nd_id_seq'::regclass);
 A   ALTER TABLE qvc_upsi.nec_detail ALTER COLUMN nd_id DROP DEFAULT;
       qvc_upsi               postgres    false    261    263    263            (           2604    16795    nec_detail nd_nn_id    DEFAULT     ~   ALTER TABLE ONLY qvc_upsi.nec_detail ALTER COLUMN nd_nn_id SET DEFAULT nextval('qvc_upsi.nec_detail_nd_nn_id_seq'::regclass);
 D   ALTER TABLE qvc_upsi.nec_detail ALTER COLUMN nd_nn_id DROP DEFAULT;
       qvc_upsi               postgres    false    262    263    263            $           2604    16775    nec_narrow nn_id    DEFAULT     x   ALTER TABLE ONLY qvc_upsi.nec_narrow ALTER COLUMN nn_id SET DEFAULT nextval('qvc_upsi.nec_narrow_nn_id_seq'::regclass);
 A   ALTER TABLE qvc_upsi.nec_narrow ALTER COLUMN nn_id DROP DEFAULT;
       qvc_upsi               postgres    false    258    260    260            %           2604    16783    nec_narrow nn_nb_id    DEFAULT     ~   ALTER TABLE ONLY qvc_upsi.nec_narrow ALTER COLUMN nn_nb_id SET DEFAULT nextval('qvc_upsi.nec_narrow_nn_nb_id_seq'::regclass);
 D   ALTER TABLE qvc_upsi.nec_narrow ALTER COLUMN nn_nb_id DROP DEFAULT;
       qvc_upsi               postgres    false    259    260    260                       2604    16554    notifications n_id    DEFAULT     |   ALTER TABLE ONLY qvc_upsi.notifications ALTER COLUMN n_id SET DEFAULT nextval('qvc_upsi.notifications_n_id_seq'::regclass);
 C   ALTER TABLE qvc_upsi.notifications ALTER COLUMN n_id DROP DEFAULT;
       qvc_upsi               postgres    false    241    240    241                       2604    16450    provider pvd_id    DEFAULT     v   ALTER TABLE ONLY qvc_upsi.provider ALTER COLUMN pvd_id SET DEFAULT nextval('qvc_upsi.provider_pvd_id_seq'::regclass);
 @   ALTER TABLE qvc_upsi.provider ALTER COLUMN pvd_id DROP DEFAULT;
       qvc_upsi               postgres    false    225    224    225                       2604    16463    qvc_admin qa_id    DEFAULT     v   ALTER TABLE ONLY qvc_upsi.qvc_admin ALTER COLUMN qa_id SET DEFAULT nextval('qvc_upsi.qvc_admin_qa_id_seq'::regclass);
 @   ALTER TABLE qvc_upsi.qvc_admin ALTER COLUMN qa_id DROP DEFAULT;
       qvc_upsi               postgres    false    226    227    227            �           2604    16421    qvc_university qu_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.qvc_university ALTER COLUMN qu_id SET DEFAULT nextval('qvc_upsi.qvc_university_qu_id_seq'::regclass);
 E   ALTER TABLE qvc_upsi.qvc_university ALTER COLUMN qu_id DROP DEFAULT;
       qvc_upsi               postgres    false    220    221    221                       2604    16514    samc samc_id    DEFAULT     p   ALTER TABLE ONLY qvc_upsi.samc ALTER COLUMN samc_id SET DEFAULT nextval('qvc_upsi.samc_samc_id_seq'::regclass);
 =   ALTER TABLE qvc_upsi.samc ALTER COLUMN samc_id DROP DEFAULT;
       qvc_upsi               postgres    false    236    237    237                       2604    16603    samc_assessment sa_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.samc_assessment ALTER COLUMN sa_id SET DEFAULT nextval('qvc_upsi.samc_assessment_sa_id_seq'::regclass);
 F   ALTER TABLE qvc_upsi.samc_assessment ALTER COLUMN sa_id DROP DEFAULT;
       qvc_upsi               postgres    false    246    247    247                       2604    16633    samc_payment sp_id    DEFAULT     |   ALTER TABLE ONLY qvc_upsi.samc_payment ALTER COLUMN sp_id SET DEFAULT nextval('qvc_upsi.samc_payment_sp_id_seq'::regclass);
 C   ALTER TABLE qvc_upsi.samc_payment ALTER COLUMN sp_id DROP DEFAULT;
       qvc_upsi               postgres    false    250    251    251                       2604    16647    samc_payment_item spi_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.samc_payment_item ALTER COLUMN spi_id SET DEFAULT nextval('qvc_upsi.samc_payment_item_spi_id_seq'::regclass);
 I   ALTER TABLE qvc_upsi.samc_payment_item ALTER COLUMN spi_id DROP DEFAULT;
       qvc_upsi               postgres    false    253    252    253                       2604    16583    samc_reject_record srr_id    DEFAULT     �   ALTER TABLE ONLY qvc_upsi.samc_reject_record ALTER COLUMN srr_id SET DEFAULT nextval('qvc_upsi.samc_reject_record_srr_id_seq'::regclass);
 J   ALTER TABLE qvc_upsi.samc_reject_record ALTER COLUMN srr_id DROP DEFAULT;
       qvc_upsi               postgres    false    245    244    245                       2604    16539    samc_review sr_id    DEFAULT     z   ALTER TABLE ONLY qvc_upsi.samc_review ALTER COLUMN sr_id SET DEFAULT nextval('qvc_upsi.samc_review_sr_id_seq'::regclass);
 B   ALTER TABLE qvc_upsi.samc_review ALTER COLUMN sr_id DROP DEFAULT;
       qvc_upsi               postgres    false    239    238    239            .          0    16702    asr_nec_mapping 
   TABLE DATA           z   COPY qvc_upsi.asr_nec_mapping (anm_id, anm_asr_id, anm_nd_id, anm_created_at, anm_updated_at, anm_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    255   �!                0    16429    assessor 
   TABLE DATA           �   COPY qvc_upsi.assessor (asr_id, asr_name, asr_email, asr_phone, asr_service_address, asr_qu_id, asr_image, asr_verification, asr_created_at, asr_updated_at, asr_deleted_at, asr_fax, asr_retirement_date, asr_gender, asr_cv_path) FROM stdin;
    qvc_upsi               postgres    false    223   �"      "          0    16562    assessor_expertise_field 
   TABLE DATA           �   COPY qvc_upsi.assessor_expertise_field (aef_id, aef_asr_id, aef_ef_id, aef_created_at, aef_updated_at, aef_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    243   e%                0    16483    auth_groups 
   TABLE DATA           t   COPY qvc_upsi.auth_groups (ag_id, ag_name, ag_description, ag_created_at, ag_updated_at, ag_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    231   �&                0    16503    auth_groups_user 
   TABLE DATA              COPY qvc_upsi.auth_groups_user (agu_id, agu_group_id, agu_user_id, agu_created_at, agu_updated_at, agu_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    235   �&                0    16493 	   auth_user 
   TABLE DATA           �   COPY qvc_upsi.auth_user (au_id, au_user_id, au_username, au_password, au_type, au_created_at, au_updated_at, au_deleted_at, au_qu_id, au_plain_password) FROM stdin;
    qvc_upsi               postgres    false    233   �&      (          0    16615    course_content_outline 
   TABLE DATA             COPY qvc_upsi.course_content_outline (cco_id, cco_samc_id, cco_desc, cco_clo, cco_presentation, cco_tutorial, cco_practical, cco_others, cco_instruction_learning_hour, cco_independent_learning_hour, cco_created_at, cco_updated_at, cco_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    249   -)                0    16473    expertise_field 
   TABLE DATA           h   COPY qvc_upsi.expertise_field (ef_id, ef_desc, ef_created_at, ef_updated_at, ef_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    229   J)      
          0    16393 
   migrations 
   TABLE DATA           ]   COPY qvc_upsi.migrations (id, version, class, "group", namespace, "time", batch) FROM stdin;
    qvc_upsi               postgres    false    219   Y5      7          0    16816    mpqua 
   TABLE DATA           �   COPY qvc_upsi.mpqua (mpq_id, mpq_address, mpq_email, mpq_phone, mpq_fax, mpq_qu_id, mpq_created_at, mpq_updated_at, mpq_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    264   �6      0          0    16759 	   nec_broad 
   TABLE DATA           k   COPY qvc_upsi.nec_broad (nb_id, nb_code, nb_name, nb_created_at, nb_updated_at, nb_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    257   ,7      6          0    16791 
   nec_detail 
   TABLE DATA           v   COPY qvc_upsi.nec_detail (nd_id, nd_nn_id, nd_code, nd_name, nd_created_at, nd_updated_at, nd_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    263   �8      3          0    16772 
   nec_narrow 
   TABLE DATA           v   COPY qvc_upsi.nec_narrow (nn_id, nn_nb_id, nn_code, nn_name, nn_created_at, nn_updated_at, nn_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    260   �F                 0    16551    notifications 
   TABLE DATA           �   COPY qvc_upsi.notifications (n_id, n_user_id, n_user_type, n_title, n_message, n_type, n_url, n_is_read, n_created_at, n_updated_at, n_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    241   �K                0    16447    provider 
   TABLE DATA           �   COPY qvc_upsi.provider (pvd_id, pvd_name, pvd_email, pvd_ssm_number, pvd_ssm_cert, pvd_type, pvd_address, pvd_doe, pvd_phone, pvd_verification, pvd_image, pvd_created_at, pvd_updated_at, pvd_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    225   �K                0    16460 	   qvc_admin 
   TABLE DATA           �   COPY qvc_upsi.qvc_admin (qa_id, qa_name, qa_email, qa_start_date, qa_expired_date, qa_qu_id, qa_level, qa_verification, qa_image, qa_created_at, qa_updated_at, qa_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    227   �L                0    16418    qvc_university 
   TABLE DATA           y   COPY qvc_upsi.qvc_university (qu_id, qu_code, qu_name, qu_type, qu_created_at, qu_updated_at, qu_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    221   M                0    16511    samc 
   TABLE DATA           �  COPY qvc_upsi.samc (samc_id, samc_pvd_id, samc_asr_id, samc_course_name, samc_mqf_level, samc_duration_hours, samc_language, samc_teaching_methods, samc_academic_credits, samc_prior_knowledge, samc_synopsis, samc_intended_learning_outcomes, samc_instructor, samc_ef_id, samc_status, samc_payment_status, samc_submit_date, samc_payment_date, samc_assigned_date, samc_reviewed_date, samc_review_count, samc_start_date, samc_expired_date, samc_created_at, samc_updated_at, samc_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    237   �R      &          0    16600    samc_assessment 
   TABLE DATA           �   COPY qvc_upsi.samc_assessment (sa_id, sa_samc_id, sa_desc, sa_type, sa_percentage, sa_instruction_learning_hour, sa_independent_learning_hour, sa_created_at, sa_updated_at, sa_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    247   �R      *          0    16630    samc_payment 
   TABLE DATA           �   COPY qvc_upsi.samc_payment (sp_id, sp_pvd_id, sp_invoice_number, sp_amount, sp_method, sp_status, sp_prove, sp_created_at, sp_updated_at, sp_deleted_at, sp_remarks, sp_log, sp_reff_num) FROM stdin;
    qvc_upsi               postgres    false    251   �R      ,          0    16644    samc_payment_item 
   TABLE DATA           }   COPY qvc_upsi.samc_payment_item (spi_id, spi_sp_id, spi_samc_id, spi_created_at, spi_updated_at, spi_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    253   �R      $          0    16580    samc_reject_record 
   TABLE DATA           �   COPY qvc_upsi.samc_reject_record (srr_id, srr_samc_id, srr_asr_id, srr_rejection_date, srr_reason, srr_created_at, srr_updated_at, srr_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    245   �R                0    16536    samc_review 
   TABLE DATA             COPY qvc_upsi.samc_review (sr_id, sr_samc_id, sr_counter, sr_samc_name, sr_samc_name_status, sr_mqf_level, sr_mqf_level_status, sr_duration_hours, sr_duration_hours_status, sr_teaching_methods, sr_teaching_methods_status, sr_academic_credits, sr_academic_credits_status, sr_synopsis, sr_synopsis_status, sr_intended_learning_outcomes, sr_intended_learning_outcomes_status, sr_content_outline, sr_content_outline_status, sr_assessment, sr_assessment_status, sr_review_status, sr_created_at, sr_updated_at, sr_deleted_at) FROM stdin;
    qvc_upsi               postgres    false    239   S      Y           0    0    asr_nec_mapping_anm_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('qvc_upsi.asr_nec_mapping_anm_id_seq', 21, true);
          qvc_upsi               postgres    false    254            Z           0    0    assessor_asr_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('qvc_upsi.assessor_asr_id_seq', 19, true);
          qvc_upsi               postgres    false    222            [           0    0 #   assessor_expertise_field_aef_id_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('qvc_upsi.assessor_expertise_field_aef_id_seq', 91, true);
          qvc_upsi               postgres    false    242            \           0    0    auth_groups_ag_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('qvc_upsi.auth_groups_ag_id_seq', 1, false);
          qvc_upsi               postgres    false    230            ]           0    0    auth_groups_user_agu_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('qvc_upsi.auth_groups_user_agu_id_seq', 1, false);
          qvc_upsi               postgres    false    234            ^           0    0    auth_user_au_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('qvc_upsi.auth_user_au_id_seq', 10, true);
          qvc_upsi               postgres    false    232            _           0    0 !   course_content_outline_cco_id_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('qvc_upsi.course_content_outline_cco_id_seq', 1, false);
          qvc_upsi               postgres    false    248            `           0    0    expertise_field_ef_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('qvc_upsi.expertise_field_ef_id_seq', 271, true);
          qvc_upsi               postgres    false    228            a           0    0    migrations_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('qvc_upsi.migrations_id_seq', 17, true);
          qvc_upsi               postgres    false    218            b           0    0    mpqua_mpq_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('qvc_upsi.mpqua_mpq_id_seq', 1, true);
          qvc_upsi               postgres    false    265            c           0    0    nec_broad_nb_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('qvc_upsi.nec_broad_nb_id_seq', 12, true);
          qvc_upsi               postgres    false    256            d           0    0    nec_detail_nd_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('qvc_upsi.nec_detail_nd_id_seq', 68, true);
          qvc_upsi               postgres    false    261            e           0    0    nec_detail_nd_nn_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('qvc_upsi.nec_detail_nd_nn_id_seq', 27, true);
          qvc_upsi               postgres    false    262            f           0    0    nec_narrow_nn_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('qvc_upsi.nec_narrow_nn_id_seq', 59, true);
          qvc_upsi               postgres    false    258            g           0    0    nec_narrow_nn_nb_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('qvc_upsi.nec_narrow_nn_nb_id_seq', 1, false);
          qvc_upsi               postgres    false    259            h           0    0    notifications_n_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('qvc_upsi.notifications_n_id_seq', 1, false);
          qvc_upsi               postgres    false    240            i           0    0    provider_pvd_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('qvc_upsi.provider_pvd_id_seq', 1, true);
          qvc_upsi               postgres    false    224            j           0    0    qvc_admin_qa_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('qvc_upsi.qvc_admin_qa_id_seq', 1, true);
          qvc_upsi               postgres    false    226            k           0    0    qvc_university_qu_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('qvc_upsi.qvc_university_qu_id_seq', 82, true);
          qvc_upsi               postgres    false    220            l           0    0    samc_assessment_sa_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('qvc_upsi.samc_assessment_sa_id_seq', 1, false);
          qvc_upsi               postgres    false    246            m           0    0    samc_payment_item_spi_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('qvc_upsi.samc_payment_item_spi_id_seq', 1, false);
          qvc_upsi               postgres    false    252            n           0    0    samc_payment_sp_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('qvc_upsi.samc_payment_sp_id_seq', 1, false);
          qvc_upsi               postgres    false    250            o           0    0    samc_reject_record_srr_id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('qvc_upsi.samc_reject_record_srr_id_seq', 1, false);
          qvc_upsi               postgres    false    244            p           0    0    samc_review_sr_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('qvc_upsi.samc_review_sr_id_seq', 1, false);
          qvc_upsi               postgres    false    238            q           0    0    samc_samc_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('qvc_upsi.samc_samc_id_seq', 1, false);
          qvc_upsi               postgres    false    236            Y           2606    16708 "   asr_nec_mapping app_nec_mapping_pk 
   CONSTRAINT     f   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping
    ADD CONSTRAINT app_nec_mapping_pk PRIMARY KEY (anm_id);
 N   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping DROP CONSTRAINT app_nec_mapping_pk;
       qvc_upsi                 postgres    false    255            3           2606    16439    assessor assessor_asr_email_key 
   CONSTRAINT     a   ALTER TABLE ONLY qvc_upsi.assessor
    ADD CONSTRAINT assessor_asr_email_key UNIQUE (asr_email);
 K   ALTER TABLE ONLY qvc_upsi.assessor DROP CONSTRAINT assessor_asr_email_key;
       qvc_upsi                 postgres    false    223            c           2606    16825    mpqua mpqua_pk 
   CONSTRAINT     R   ALTER TABLE ONLY qvc_upsi.mpqua
    ADD CONSTRAINT mpqua_pk PRIMARY KEY (mpq_id);
 :   ALTER TABLE ONLY qvc_upsi.mpqua DROP CONSTRAINT mpqua_pk;
       qvc_upsi                 postgres    false    264            [           2606    16767    nec_broad nec_broad_pk 
   CONSTRAINT     Y   ALTER TABLE ONLY qvc_upsi.nec_broad
    ADD CONSTRAINT nec_broad_pk PRIMARY KEY (nb_id);
 B   ALTER TABLE ONLY qvc_upsi.nec_broad DROP CONSTRAINT nec_broad_pk;
       qvc_upsi                 postgres    false    257            ]           2606    16769    nec_broad nec_broad_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY qvc_upsi.nec_broad
    ADD CONSTRAINT nec_broad_unique UNIQUE (nb_code);
 F   ALTER TABLE ONLY qvc_upsi.nec_broad DROP CONSTRAINT nec_broad_unique;
       qvc_upsi                 postgres    false    257            a           2606    16800    nec_detail nec_detail_pk 
   CONSTRAINT     [   ALTER TABLE ONLY qvc_upsi.nec_detail
    ADD CONSTRAINT nec_detail_pk PRIMARY KEY (nd_id);
 D   ALTER TABLE ONLY qvc_upsi.nec_detail DROP CONSTRAINT nec_detail_pk;
       qvc_upsi                 postgres    false    263            _           2606    16781    nec_narrow nec_narrow_pk 
   CONSTRAINT     [   ALTER TABLE ONLY qvc_upsi.nec_narrow
    ADD CONSTRAINT nec_narrow_pk PRIMARY KEY (nn_id);
 D   ALTER TABLE ONLY qvc_upsi.nec_narrow DROP CONSTRAINT nec_narrow_pk;
       qvc_upsi                 postgres    false    260            5           2606    16437    assessor pk_assessor 
   CONSTRAINT     X   ALTER TABLE ONLY qvc_upsi.assessor
    ADD CONSTRAINT pk_assessor PRIMARY KEY (asr_id);
 @   ALTER TABLE ONLY qvc_upsi.assessor DROP CONSTRAINT pk_assessor;
       qvc_upsi                 postgres    false    223            M           2606    16567 4   assessor_expertise_field pk_assessor_expertise_field 
   CONSTRAINT     x   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field
    ADD CONSTRAINT pk_assessor_expertise_field PRIMARY KEY (aef_id);
 `   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field DROP CONSTRAINT pk_assessor_expertise_field;
       qvc_upsi                 postgres    false    243            A           2606    16490    auth_groups pk_auth_groups 
   CONSTRAINT     ]   ALTER TABLE ONLY qvc_upsi.auth_groups
    ADD CONSTRAINT pk_auth_groups PRIMARY KEY (ag_id);
 F   ALTER TABLE ONLY qvc_upsi.auth_groups DROP CONSTRAINT pk_auth_groups;
       qvc_upsi                 postgres    false    231            E           2606    16508 $   auth_groups_user pk_auth_groups_user 
   CONSTRAINT     h   ALTER TABLE ONLY qvc_upsi.auth_groups_user
    ADD CONSTRAINT pk_auth_groups_user PRIMARY KEY (agu_id);
 P   ALTER TABLE ONLY qvc_upsi.auth_groups_user DROP CONSTRAINT pk_auth_groups_user;
       qvc_upsi                 postgres    false    235            C           2606    16500    auth_user pk_auth_user 
   CONSTRAINT     Y   ALTER TABLE ONLY qvc_upsi.auth_user
    ADD CONSTRAINT pk_auth_user PRIMARY KEY (au_id);
 B   ALTER TABLE ONLY qvc_upsi.auth_user DROP CONSTRAINT pk_auth_user;
       qvc_upsi                 postgres    false    233            S           2606    16622 0   course_content_outline pk_course_content_outline 
   CONSTRAINT     t   ALTER TABLE ONLY qvc_upsi.course_content_outline
    ADD CONSTRAINT pk_course_content_outline PRIMARY KEY (cco_id);
 \   ALTER TABLE ONLY qvc_upsi.course_content_outline DROP CONSTRAINT pk_course_content_outline;
       qvc_upsi                 postgres    false    249            ?           2606    16480 "   expertise_field pk_expertise_field 
   CONSTRAINT     e   ALTER TABLE ONLY qvc_upsi.expertise_field
    ADD CONSTRAINT pk_expertise_field PRIMARY KEY (ef_id);
 N   ALTER TABLE ONLY qvc_upsi.expertise_field DROP CONSTRAINT pk_expertise_field;
       qvc_upsi                 postgres    false    229            -           2606    16400    migrations pk_migrations 
   CONSTRAINT     X   ALTER TABLE ONLY qvc_upsi.migrations
    ADD CONSTRAINT pk_migrations PRIMARY KEY (id);
 D   ALTER TABLE ONLY qvc_upsi.migrations DROP CONSTRAINT pk_migrations;
       qvc_upsi                 postgres    false    219            K           2606    16559    notifications pk_notifications 
   CONSTRAINT     `   ALTER TABLE ONLY qvc_upsi.notifications
    ADD CONSTRAINT pk_notifications PRIMARY KEY (n_id);
 J   ALTER TABLE ONLY qvc_upsi.notifications DROP CONSTRAINT pk_notifications;
       qvc_upsi                 postgres    false    241            7           2606    16455    provider pk_provider 
   CONSTRAINT     X   ALTER TABLE ONLY qvc_upsi.provider
    ADD CONSTRAINT pk_provider PRIMARY KEY (pvd_id);
 @   ALTER TABLE ONLY qvc_upsi.provider DROP CONSTRAINT pk_provider;
       qvc_upsi                 postgres    false    225            ;           2606    16468    qvc_admin pk_qvc_admin 
   CONSTRAINT     Y   ALTER TABLE ONLY qvc_upsi.qvc_admin
    ADD CONSTRAINT pk_qvc_admin PRIMARY KEY (qa_id);
 B   ALTER TABLE ONLY qvc_upsi.qvc_admin DROP CONSTRAINT pk_qvc_admin;
       qvc_upsi                 postgres    false    227            /           2606    16424     qvc_university pk_qvc_university 
   CONSTRAINT     c   ALTER TABLE ONLY qvc_upsi.qvc_university
    ADD CONSTRAINT pk_qvc_university PRIMARY KEY (qu_id);
 L   ALTER TABLE ONLY qvc_upsi.qvc_university DROP CONSTRAINT pk_qvc_university;
       qvc_upsi                 postgres    false    221            G           2606    16518    samc pk_samc 
   CONSTRAINT     Q   ALTER TABLE ONLY qvc_upsi.samc
    ADD CONSTRAINT pk_samc PRIMARY KEY (samc_id);
 8   ALTER TABLE ONLY qvc_upsi.samc DROP CONSTRAINT pk_samc;
       qvc_upsi                 postgres    false    237            Q           2606    16607 "   samc_assessment pk_samc_assessment 
   CONSTRAINT     e   ALTER TABLE ONLY qvc_upsi.samc_assessment
    ADD CONSTRAINT pk_samc_assessment PRIMARY KEY (sa_id);
 N   ALTER TABLE ONLY qvc_upsi.samc_assessment DROP CONSTRAINT pk_samc_assessment;
       qvc_upsi                 postgres    false    247            U           2606    16637    samc_payment pk_samc_payment 
   CONSTRAINT     _   ALTER TABLE ONLY qvc_upsi.samc_payment
    ADD CONSTRAINT pk_samc_payment PRIMARY KEY (sp_id);
 H   ALTER TABLE ONLY qvc_upsi.samc_payment DROP CONSTRAINT pk_samc_payment;
       qvc_upsi                 postgres    false    251            W           2606    16649 &   samc_payment_item pk_samc_payment_item 
   CONSTRAINT     j   ALTER TABLE ONLY qvc_upsi.samc_payment_item
    ADD CONSTRAINT pk_samc_payment_item PRIMARY KEY (spi_id);
 R   ALTER TABLE ONLY qvc_upsi.samc_payment_item DROP CONSTRAINT pk_samc_payment_item;
       qvc_upsi                 postgres    false    253            O           2606    16587 (   samc_reject_record pk_samc_reject_record 
   CONSTRAINT     l   ALTER TABLE ONLY qvc_upsi.samc_reject_record
    ADD CONSTRAINT pk_samc_reject_record PRIMARY KEY (srr_id);
 T   ALTER TABLE ONLY qvc_upsi.samc_reject_record DROP CONSTRAINT pk_samc_reject_record;
       qvc_upsi                 postgres    false    245            I           2606    16543    samc_review pk_samc_review 
   CONSTRAINT     ]   ALTER TABLE ONLY qvc_upsi.samc_review
    ADD CONSTRAINT pk_samc_review PRIMARY KEY (sr_id);
 F   ALTER TABLE ONLY qvc_upsi.samc_review DROP CONSTRAINT pk_samc_review;
       qvc_upsi                 postgres    false    239            9           2606    16457    provider provider_pvd_email_key 
   CONSTRAINT     a   ALTER TABLE ONLY qvc_upsi.provider
    ADD CONSTRAINT provider_pvd_email_key UNIQUE (pvd_email);
 K   ALTER TABLE ONLY qvc_upsi.provider DROP CONSTRAINT provider_pvd_email_key;
       qvc_upsi                 postgres    false    225            =           2606    16470     qvc_admin qvc_admin_qa_email_key 
   CONSTRAINT     a   ALTER TABLE ONLY qvc_upsi.qvc_admin
    ADD CONSTRAINT qvc_admin_qa_email_key UNIQUE (qa_email);
 L   ALTER TABLE ONLY qvc_upsi.qvc_admin DROP CONSTRAINT qvc_admin_qa_email_key;
       qvc_upsi                 postgres    false    227            1           2606    16426 )   qvc_university qvc_university_qu_code_key 
   CONSTRAINT     i   ALTER TABLE ONLY qvc_upsi.qvc_university
    ADD CONSTRAINT qvc_university_qu_code_key UNIQUE (qu_code);
 U   ALTER TABLE ONLY qvc_upsi.qvc_university DROP CONSTRAINT qvc_university_qu_code_key;
       qvc_upsi                 postgres    false    221            s           2606    16709 +   asr_nec_mapping asr_nec_mapping_assessor_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping
    ADD CONSTRAINT asr_nec_mapping_assessor_fk FOREIGN KEY (anm_asr_id) REFERENCES qvc_upsi.assessor(asr_id);
 W   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping DROP CONSTRAINT asr_nec_mapping_assessor_fk;
       qvc_upsi               postgres    false    4917    223    255            t           2606    16806 -   asr_nec_mapping asr_nec_mapping_nec_detail_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping
    ADD CONSTRAINT asr_nec_mapping_nec_detail_fk FOREIGN KEY (anm_nd_id) REFERENCES qvc_upsi.nec_detail(nd_id);
 Y   ALTER TABLE ONLY qvc_upsi.asr_nec_mapping DROP CONSTRAINT asr_nec_mapping_nec_detail_fk;
       qvc_upsi               postgres    false    263    4961    255            d           2606    16440 #   assessor assessor_asr_qu_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.assessor
    ADD CONSTRAINT assessor_asr_qu_id_foreign FOREIGN KEY (asr_qu_id) REFERENCES qvc_upsi.qvc_university(qu_id) ON UPDATE CASCADE ON DELETE CASCADE;
 O   ALTER TABLE ONLY qvc_upsi.assessor DROP CONSTRAINT assessor_asr_qu_id_foreign;
       qvc_upsi               postgres    false    223    221    4911            j           2606    16568 D   assessor_expertise_field assessor_expertise_field_aef_asr_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field
    ADD CONSTRAINT assessor_expertise_field_aef_asr_id_foreign FOREIGN KEY (aef_asr_id) REFERENCES qvc_upsi.assessor(asr_id) ON UPDATE CASCADE ON DELETE CASCADE;
 p   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field DROP CONSTRAINT assessor_expertise_field_aef_asr_id_foreign;
       qvc_upsi               postgres    false    243    4917    223            k           2606    16573 C   assessor_expertise_field assessor_expertise_field_aef_ef_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field
    ADD CONSTRAINT assessor_expertise_field_aef_ef_id_foreign FOREIGN KEY (aef_ef_id) REFERENCES qvc_upsi.expertise_field(ef_id) ON UPDATE CASCADE ON DELETE CASCADE;
 o   ALTER TABLE ONLY qvc_upsi.assessor_expertise_field DROP CONSTRAINT assessor_expertise_field_aef_ef_id_foreign;
       qvc_upsi               postgres    false    243    229    4927            e           2606    16811 %   auth_user auth_user_qvc_university_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.auth_user
    ADD CONSTRAINT auth_user_qvc_university_fk FOREIGN KEY (au_qu_id) REFERENCES qvc_upsi.qvc_university(qu_id);
 Q   ALTER TABLE ONLY qvc_upsi.auth_user DROP CONSTRAINT auth_user_qvc_university_fk;
       qvc_upsi               postgres    false    233    4911    221            o           2606    16623 A   course_content_outline course_content_outline_cco_samc_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.course_content_outline
    ADD CONSTRAINT course_content_outline_cco_samc_id_foreign FOREIGN KEY (cco_samc_id) REFERENCES qvc_upsi.samc(samc_id) ON UPDATE CASCADE ON DELETE CASCADE;
 m   ALTER TABLE ONLY qvc_upsi.course_content_outline DROP CONSTRAINT course_content_outline_cco_samc_id_foreign;
       qvc_upsi               postgres    false    249    237    4935            w           2606    16830    mpqua mpqua_qvc_university_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.mpqua
    ADD CONSTRAINT mpqua_qvc_university_fk FOREIGN KEY (mpq_qu_id) REFERENCES qvc_upsi.qvc_university(qu_id);
 I   ALTER TABLE ONLY qvc_upsi.mpqua DROP CONSTRAINT mpqua_qvc_university_fk;
       qvc_upsi               postgres    false    4911    221    264            v           2606    16801 #   nec_detail nec_detail_nec_narrow_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.nec_detail
    ADD CONSTRAINT nec_detail_nec_narrow_fk FOREIGN KEY (nd_nn_id) REFERENCES qvc_upsi.nec_narrow(nn_id);
 O   ALTER TABLE ONLY qvc_upsi.nec_detail DROP CONSTRAINT nec_detail_nec_narrow_fk;
       qvc_upsi               postgres    false    260    263    4959            u           2606    16784 "   nec_narrow nec_narrow_nec_broad_fk    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.nec_narrow
    ADD CONSTRAINT nec_narrow_nec_broad_fk FOREIGN KEY (nn_nb_id) REFERENCES qvc_upsi.nec_broad(nb_id);
 N   ALTER TABLE ONLY qvc_upsi.nec_narrow DROP CONSTRAINT nec_narrow_nec_broad_fk;
       qvc_upsi               postgres    false    4955    257    260            n           2606    16608 2   samc_assessment samc_assessment_sa_samc_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_assessment
    ADD CONSTRAINT samc_assessment_sa_samc_id_foreign FOREIGN KEY (sa_samc_id) REFERENCES qvc_upsi.samc(samc_id) ON UPDATE CASCADE ON DELETE CASCADE;
 ^   ALTER TABLE ONLY qvc_upsi.samc_assessment DROP CONSTRAINT samc_assessment_sa_samc_id_foreign;
       qvc_upsi               postgres    false    4935    237    247            q           2606    16655 7   samc_payment_item samc_payment_item_spi_samc_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_payment_item
    ADD CONSTRAINT samc_payment_item_spi_samc_id_foreign FOREIGN KEY (spi_samc_id) REFERENCES qvc_upsi.samc(samc_id) ON UPDATE CASCADE ON DELETE CASCADE;
 c   ALTER TABLE ONLY qvc_upsi.samc_payment_item DROP CONSTRAINT samc_payment_item_spi_samc_id_foreign;
       qvc_upsi               postgres    false    4935    237    253            r           2606    16650 5   samc_payment_item samc_payment_item_spi_sp_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_payment_item
    ADD CONSTRAINT samc_payment_item_spi_sp_id_foreign FOREIGN KEY (spi_sp_id) REFERENCES qvc_upsi.samc_payment(sp_id) ON UPDATE CASCADE ON DELETE CASCADE;
 a   ALTER TABLE ONLY qvc_upsi.samc_payment_item DROP CONSTRAINT samc_payment_item_spi_sp_id_foreign;
       qvc_upsi               postgres    false    4949    253    251            p           2606    16638 +   samc_payment samc_payment_sp_pvd_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_payment
    ADD CONSTRAINT samc_payment_sp_pvd_id_foreign FOREIGN KEY (sp_pvd_id) REFERENCES qvc_upsi.auth_user(au_id) ON UPDATE CASCADE ON DELETE CASCADE;
 W   ALTER TABLE ONLY qvc_upsi.samc_payment DROP CONSTRAINT samc_payment_sp_pvd_id_foreign;
       qvc_upsi               postgres    false    233    4931    251            l           2606    16593 8   samc_reject_record samc_reject_record_srr_asr_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_reject_record
    ADD CONSTRAINT samc_reject_record_srr_asr_id_foreign FOREIGN KEY (srr_asr_id) REFERENCES qvc_upsi.assessor(asr_id) ON UPDATE CASCADE ON DELETE CASCADE;
 d   ALTER TABLE ONLY qvc_upsi.samc_reject_record DROP CONSTRAINT samc_reject_record_srr_asr_id_foreign;
       qvc_upsi               postgres    false    4917    223    245            m           2606    16588 9   samc_reject_record samc_reject_record_srr_samc_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_reject_record
    ADD CONSTRAINT samc_reject_record_srr_samc_id_foreign FOREIGN KEY (srr_samc_id) REFERENCES qvc_upsi.samc(samc_id) ON UPDATE CASCADE ON DELETE CASCADE;
 e   ALTER TABLE ONLY qvc_upsi.samc_reject_record DROP CONSTRAINT samc_reject_record_srr_samc_id_foreign;
       qvc_upsi               postgres    false    245    4935    237            i           2606    16544 *   samc_review samc_review_sr_samc_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc_review
    ADD CONSTRAINT samc_review_sr_samc_id_foreign FOREIGN KEY (sr_samc_id) REFERENCES qvc_upsi.samc(samc_id) ON UPDATE CASCADE ON DELETE CASCADE;
 V   ALTER TABLE ONLY qvc_upsi.samc_review DROP CONSTRAINT samc_review_sr_samc_id_foreign;
       qvc_upsi               postgres    false    237    4935    239            f           2606    16524    samc samc_samc_asr_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc
    ADD CONSTRAINT samc_samc_asr_id_foreign FOREIGN KEY (samc_asr_id) REFERENCES qvc_upsi.auth_user(au_id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY qvc_upsi.samc DROP CONSTRAINT samc_samc_asr_id_foreign;
       qvc_upsi               postgres    false    233    237    4931            g           2606    16529    samc samc_samc_ef_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc
    ADD CONSTRAINT samc_samc_ef_id_foreign FOREIGN KEY (samc_ef_id) REFERENCES qvc_upsi.expertise_field(ef_id) ON UPDATE CASCADE ON DELETE CASCADE;
 H   ALTER TABLE ONLY qvc_upsi.samc DROP CONSTRAINT samc_samc_ef_id_foreign;
       qvc_upsi               postgres    false    4927    229    237            h           2606    16519    samc samc_samc_pvd_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY qvc_upsi.samc
    ADD CONSTRAINT samc_samc_pvd_id_foreign FOREIGN KEY (samc_pvd_id) REFERENCES qvc_upsi.auth_user(au_id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY qvc_upsi.samc DROP CONSTRAINT samc_samc_pvd_id_foreign;
       qvc_upsi               postgres    false    237    4931    233            .   �   x����m�0D�Rn��Qb�`��#��]#�䲀n�ތ8��iMX|g��&)A6š��U������liJ#<Ԟ$n����dҩί����\'�iN��f<Am�A��;�),E�%t�A�R�XR%�;�>}��!8u%�H��i���C��{�`��V��1�q��B|D�]=R�.ܬ��#ݒ���nV���:��A��o~\`�         �  x����n�0E��W��k��ԛ��b&�[��ۤ�)�KG���!1�d*�ĒsX'g��P�ʤ(Es�[mm��o�-"Ri�����e���g􎀀9&"�$d&$�����M�BnB �?�A�I����ՌhϭcSoyҌ��@�y�@�� =�愺n�}���g՘����e:�MgH�)*�͏d�ᘷ�N�."$����,�_Yw4�-�����?"5�� lѾ2C�U^m��r��v�ls_���n���?��3ɋ�L�E��i�~�,��M�n�8O�N$c�g�*����̉�?���t�L��I4_"}9�	�F�V�h��)��6ZI�P�9�+���	#�JI��议E�V��7�E�]��͗N�E4==�Yː��QL('R_��N�kh�8j��d�7���Ӄ9� �I��R����?t4���f�\'o�*��j���U���	YӉ�\cI	����4;�Г�R�A��d��JI�mq�/R�����{x�k�J��]V.J�[�*�\�~%'7��`i�_�l�N��{:��/Ee@LȠ����n��<��Eܠ��
����J��H��<�\��	(�>��a�$��Mi�-�9̚��^�|#��b��T���\SNԉ�ӟ��X�9�H,9pЃV= ��fg���ER���}���B)Q��i�}�>z����/s��A      "   ?  x���ݍ1���*��X��1�
��s�\��I�H��|^�"���|�D�����P���[�zt	U A쟐8I��D,��$�5���0��ݮu�_Or ~�І��m�T�,�Γ�x:Oڮ�Yj��9�����m#�m+!����X3��"�JPud���u��� o,�r�o�p�V�I����ϻ�{-Ic�-٥:Nr��Ҡ��f;Z�`?�3L���Q�^'���gΗ�ʨS�h4f�!L[�/+�l>s���2k(�:Mo�N�H��7f�ﲍ�plS��y��*o�A���Q���ņ��y����[��~n���            x������ � �            x������ � �         /  x�m�˒�0�5>���N:	!vxW�6�65US�*����3mO[=Ug�J��s~�!n�e{�Ľ����I'Õ���*��:e��=�ez��@��6?�՝�t�8{�=���<��s�a���-�ET��-�� %��i|Vs��S�%7��_[y#�͛�d�j?S͚�P�dq ��)�2����(�	QWs��E�%��2f Ly�����i=�m�+.�s���3��uu\;�0j�[h�7!�yW_���@7Qo�3�1�f�2
J[���,P� � �=��U7���WY�Ư6��PE�1���yy�B���j][��A]|{�]-�Dp�9�����e�dH��y�'Vhٿ>���5�5��h4ٟ�R����ZS��>b���PѪk�k��ۑ��M�e$�X����'�v�E|<����N�Y�X�˲�Õ�P�S��v^L��V'��A}$�1��Zٚ�2��
�*v�q�((�0"w��T�ޓF�v�a�t�����R;tR��?�yы��J��
Yh6���a�^7�M��&�����>�CJ�#b��'�t:����      (      x������ � �         �  x���Ks�8��ȧ�)孲�|?��WoŎ7�L.s�)X"�t�|�i��%6�U�)��_�ht7��������K���=�i]2�ar�ÿ��?���x秩g����&4��EWҖ�z��L�~r�I��i��;��˪[���.m��k�|l��o���Ś׼i��Ŀ�iM�l��vN�)���Вy���׌�qO�,%}l�?�[�^�8� 6튵���ق���S9]J��5кi���ʮj;I+���� 0@�x�5_;w�K�q�#G��U{qrF���Y��E%�����{�����AH\z����FH��Jݮ`�n)�݉���Cๅ# P���'�S �l6�Q;�-!�4_�-�*��MVL6�)hZ����0����s��uF����� z��Q��B�,W�e�ֳ�����mE��UP�l5z����(*.p�`D���G�מӚ
�}�{���~>}5����;���Wǰt)���?1*�����tZ��^#O��4�X�Q��L?��	{��i���wRe��`%Ԋ5�J�3Zs�ܣ��qQ��S[#�CD�;V5l������"q~(�U۵��\v�� g�&�D��崀Ĳ��K�[+N\H��8�%�zP͜Z!x)@9���7�����o�s�`Q�`B�go�h��s��]_"%�Df��o�Vr����	�m��RYqN�Ų��<17� p1�^��P{��\w����Ĩ����0Cl<I�c�i��p������0O�lA�6Ѹ�V��h�4VZʅ��J���T[�Z��I7+�����D�M�_��h�a_*������>I���X�xo���@�2J����Mv)x���Raޠ+G�����K�%��\���R���^��㐊��Hɨ^�W����߂���[��/�-Ч�I���0 Pcފ�cUH� ��@4�U�>U�`O0:�\��YA9�ԁ`�6")�D�!+�e��a�ػe�T��[��IX3!ы����-�,&�Y�6�,!��{��������$���;:_�j��U��\p�2\���z��æ��I8Y10+;.~>�':!�� Ѐ\��A>�yH.���==�+!f2����(��i��ψ�Σ�6tL�'d���X�Ns��������mi�YM��r�d�w��)��^��ġӅO̎�6�7rE`�.�]Z(���/�� W��}_�@�)�+b�z��S�t��"�p���խd�j�I�����;O��9��Q&�|$��[��c�a�~�d�jW/�Y���?��9'T��vi^J�p(c��x���b��l:١�A1�yk+��S�>�V��F��%Pa��ecH�;���@�O� ��R����f��8Q�O��f���-���
3xA0a�j^6���ԧ�N݌V-񹚍MƊdj�y͛x"���6���j{����L�3�
��rLjI��������F	�rX�	R���6�>�?��?�{sw���۔m  �#�]�>F���G:	0�-C���d:��~Rb�����i��TW���>'����K��b��ڼ���?����ݟvح2cƣ]�Wg����B�V:���x��.���;o_G]QHOJ6T�m6�ލ���]�n	�T�'�p�{����7S��/��*et�e�#_��lYŦ�WQP���Qd�a�+�'��q0b�� 2�lTn
���l��d1 �[�Z��1H�kD']=^��8� 6V�ڣ�����bȜ���Y�uh����k$�G-�����K��fC��ò�@�1�m&�c��;���CuޭɎ!=$�|�m6�
y?�����x��Չ/�J�O��b_��T2��'�����zӀ��0�o����C2�~[N>�xL�Z�P9�����~�����|��t�l� �|⏐->��n�������b�k��V�̇�J����O�̃�� ]��,4@|D��L�3pL�\���;\�����>{��ґq�l��3�{���:`ٺS�|6�M�u�T(�#U'Z��S�{զ��`U��=x��f��yM֝�#}+��C�=OF��+B�<�/l��%��F�����J����[��%������U�[�\I	B��Pb���s�n��&���s��ayc&�Pr��Ah���h=���.��t��WV��Nab��f����P�� ��;(&��Ft�'
0؂�;����8��'�jM�{Ć�	2�pǞ�+c,���Mk�5(k�pn�h^�,�\���|���^յ8Ta�-f�����۬m�$`~��J�pu��@Qb�>n!(��Z�n�QL{�I�i�����4գ�ܰ��,�H�4�AL� �tBfB<�yJ>_칲m7��g���59�4��ش��?x�<uO�жR#�|k޲�۞-;�O�V E�ǵ��|�K�ȿ�����G�0b/�-��s��k���ܼ�|w�c)K�PE�~�S��W!���jSrˤ�K������1�^��W�,�_s�S��������@��b�~7����Z4���G&z/K��Sm��`�W���#D!����g�y����L�� %&��V��X�9�lK 4˕�\��AbR,%]�q�!*���Š��>?���c��_�L_�l� �k��>�Y�S��J�x����YU5���p���6��ϟ[ъ���;mÂ�1���ʨ�k|�����~�¯k�G�X/a�Hx��D�������������m*�Mͦ6l�is	�%]c�K룆����԰�_uqF�g6��/�A`Ǧ w�n�R��D}ꆹ�cs���V������4lP�(1�dL�ԧ3��I��7jv���uu����H��濾$'��=]q5o�܃���m3��?��/��^�'�6#�|�U�!ym�Fzr�Gj1S*��d��㨷4A�rҔ@D&$�w���`F��֎k�Ԇ�	��(gcń9MF�����}����W����~��͛ �Ӑ�      
   \  x����N�0��5��W`�d�ą:�ΎM�h����%ebNgâ	��iZh��a��e�i�u]�_*���B�����n��k���P�=��������kMD,�H�*�!�m�帝Yֶ�Y�+���K��ޘv�%`�8�c�=��Z7�-g��<�������5T%R���Q�z�zcھ���,tI����辧'�Ǿ�_�QX���J�qj�T] .%KXz�[4�c<��d:5��[����[�w���I�"%��0�^�A�P���?F����f��qXB.4��7v|6n,<���`���#���Dp�Y6��3H��g�x�˿uP#��"�O�C�@      7   W   x�3���s
��T�u�q�t�L�/*�/J,Iu(��KM)�˭��!CN##S]3]s#+c3+=KcC#S��=... �~      0   �  x�}��n� �ד����&�V�l��D�ͩ-�F}�Nܣ%Gb1H��υ���z�!o1�QO�MD�=y/ztgtv�'���;*�$��펲���^��8P��r\��cj�	���[��c>Wʤ���^V�J)ZV����qz$�8�Mk�'���q�f����X���%P%9o��~rޥg����:���7�*�I��q�.{�bέ��q:}/��N6����[�-�~��e�0M��͐l����+��@%U���}����}���At�����|1׆w&v�c����{��2"Į	����ȥ�ԋ���TS��T)��(P���0k�v<�hoq��� ��6~8sk ��N,���Ύ{R���=+!�r�/��j��F�      6   �  x��Z�r�F}����I�͚+÷�ko��ɺ���K^ p$"���=���		\�\e�q����>}p�P�NH�)ʼZuEi��toW6C[�U��Wy�]��m���l�U���ۡ�w�]m�mY�m���|G�ʍ�6���V�`�����&TB��,����%T�^���������C��;,�)��R��b��*��86�Zxn��X���@�2 ������5Us7'�3�ċ��;�Ԩ���y����9�B$��"?��3p�YU�u�m9�lʴ�沄�P�H�'oO�d4���>�*lR*�N�&�5�#M#xkMۗ����_�AX������s[�ؕ�/::SYP�G�ɯf[��G���p9"��J?.�6F3rAB����޴�%��P�5\�:��]���>��`ͭW��������W�r��1��<���`��WS�>�RD�#AuB8��CvДo�e]v};����G,S,	(	��I��S˱���"�Ǧ�OE�����������g|^H#�h,����߮n��[@*�������� ���ɧ��A�'H�~�`���ɯy���C��{�d�fӝkS�%M���5}�ln����?�@�	���MmZ[�M��/���k�Y 8�4�?��K����_,�	��%�;/\����Ì�b:RZ�v���g�vMm��[YUs���A���$�r?-H_�G2�C��	��"�>l��u%��4f�r8��ό�Jc9ɜ,K��9R!
bͻ��V��X3㶔�O;(�� L0�~���n�4~?ˏew)�4�"�.q�b�:`=���:���`���Z~謁���mT.����ѧ����	�C����v7��<��C����,�n��Q��O�A��A`ͻ���YoŮ.����c7���URG�S��(y����A��A�*�v@�,�5]y7�e$��r�������I��(�Ȝ�H޷�m�,��y�Q�vr(�eѱq7���
2�\P�5cIaq�.�7���CCС��z�t8��A8����^���b"K�˙J~o�o��jf�XL3/�_lD��RBJ��	I��7��̿W$8$Ec�Z'^��7/4m3fd*�)�(�I���p�s$a<�j�b*� ������v�.vgl+[��v=�܍?�D醩�k��'B���+m�9Ύ�놤*��v�lx�!ٚJt���ǧ�qFF�*�$��2(�{��A�"̖i���üx;��x(b��сtɇ��l�zo�~�w8���$��Mg�c��e��!��`1X��b䡬�H	3�&@���!M�n�����[
��+9I>���%���T�,c��)�i�~&2���ӹ��b�P�n��NTӸ^Q�Kr�9�M��^F�z�/=,��KH��B
��,��Qk�:��)������(Sc�2/ǒ/ф�T�� -*�|��W��S��k�0ӆ�d$A�	n��u�ܧ׈�
<��QLRp�g�6c�6�\�ç�_�\���]���̀|p�ƈ�x�-����/#+��> s��@hn���0��B+�d� lc�兗���f��IV*�*��$<ts��ǅK�zA�����j5��6�DD�ׅ��c�/[��Y�UK�����2�*?��9�hg�!�3�Nn���B)�y��i�oS�w��)�.cH���!;����k�Ǹ{��sY� ��a�����9���w�K���#B�D\V]��,�q_���d�/��
x)Y��F+I�V{��WoO��H4"���Cͅ�0 h�:0�0�Q��#x��a(2>�P�-+��b)�jFZ��e�yi��������q��e����|+�T5�3� eā	�Ԉ��٭39������@�ᠱ�;�fv�
�%�Z��AD�G淵�n��V�ҷnð��ajak��_�t�?EOt�T>��o���m8z
z	���W��b�Ou���tg��@q���á�LѷeQ��|jӞ�E�O�'��Ap�ԡɇ���n2�H�N�0����A�y�;z8����i�F��02���+�{�l���ʃ��l�����H�f-=\��/����!Hk+|�ՓA
7�*�˹�ǉ�����K�kA'��iӣ�3�X�-��4��5���Ep�"�F��kz�n�p�4��4�xeA���
�xaf'cx(Vw�loW��`Z���z�3{��gp�V,�R�˓��{_V�U����i����ael��Π
�-J�EH�5�xS�q?O֘'(3q=�Pr��x��OTud%2õ�v�[�J�(�ȗ��7���y��k����G/���e�U�U3�VF��K��?�M^��ɝ+����@c��P�x��PV�K�?#���%��ɗ���h�K��1a�$�%1$ߐq3,cɵOEíz����Zx�&��mzAA�`rVZ_]dDm�(���X%� d�=�Uk��Ĭ�Õ��$m���7�-F�����(��⍣P��HFO^�3=Y/<�x�|z˛��Ň��4�oZ�vH@��#ޮ���e%�I�-�����: �,��i��]Ìc|�E�4hH�c��1��d�Nja�3�7��\�H$ �4F�^�-O{� �f�ʦ{��0�#?]�}�e��H"БF�b�߹�i��|Ah�a���q:�j"M�N�F��0��ʈ#<M���O'�Y!�:	m��e�wLT�H�o�,O�f����ۇ�����>C��{8��O��8����QV8c�c���M�Q��8��ԁ��䓇2,���m~x�Eq�ߔU��g2�0��0Lu8i�y�����*N�S1^�-8)e?ؖ~��C5l6:���Q��3�)�C8|}G/�����t�I#�_�'�/ �tzC��mQ�[��5m��?���v�Me윊>�V�)��^�q��a�CG�*r��xl�&`���8|��)�p���o��������L��M�8�������'�Z�}��h�:�R�_Ǹ�3��Qͳ#�Y�'Z�9���LR���(_�.'���~��~�5�O��i� ���	�]����pGIt�����D3EN\�3�A����R`R���b�|	���EIw }Io��+[�r������v�K�#��C�m����o?�2��HKP�ւ�A꿽�L�=�& ��P���ZBM�tKH�=���ǻ��MQ��R�1�-�0J7T�	US�F�j�!�.�^�]�]�@�l�����]0o|y�oM����]a,0���W�z���6I⺘"��ݮs��n�(��x��kZ�4%b: �C�-��9 �9�<��r�F�&���ga��që�=~<w��C��� �����!�8��fZL�f!����Tw6���
Lik��t�^
��>.����g��鶑Q�O��=���O�#qt�m��X�̯��[�<�e�U��?�o޼�03�      3     x��X�n7]�_1�p>��v7)Ҡ@�v��dDIlFwr���䈔�5�/�D��s�4Aa���ƙ���}�n�j�3}Q�U��X5vm�j�����z솭銕Y[gV�b*�a񎈂�%�/��Rr!��/�uC�A����s2��d�Y�Kr$c����v0]U�w��p.�`G8p�~3]ߺ�)��i2�\M�@��>��7`�)��{�ߗfM:K��:%��>�Ɖ���%�
)��_ 
}r`ɻ��k{�XWu�QZ�o��u��\P+��	P�!L1��&�������S�-	]B)�GBI <�iژ���)�x����[���h*������0*��`��a�se0%�e�Ѐ����m��$zNX�Y�}���,2�R��p�f���ַAm��M[�ݎ4��wAȺu���1f���K"���d�J$*y�of[�-=R>�$�"�PH�(�%�x�$>O]������j��JP9e�*��|�Tb��]*�ߜ��&�1�Rei$��{�g:�jg���djS=�O~)��.�	�N{`�ʅ~�7d�f1>���}����V*�44|��l~�`��($M�3���Y:?mRp� �DX`���t�-�)�uQO���?�N�TǮ�V�R�C�6��z�3M5�Յ���)�e`���ۮu�
PL��7�����%%��`R{,G�f=ɐ(��㪒roH���48����H�=��kMC&=�$°�}zm����.TH.5�X�0�=�U��:��ģ(�U�RK������m��n\W5���᠍�z�}(��/�^0�D��{�y��ͣ�aR���}"����D �P��#�&`m����t�2�0�/�-,֞������!�+�a�ryNJUʰ���9SR.NA�@p�^;?���ʒ��.e�~V#�b�\컓���/>U0�+ش7���)'P�����-؛��͙]�%,᱒���j�Z�Ez����Q���@`'H�b��]�?�Q\�=�����t�� Idji.�m�m�g��8-�A�����u�ooA.<���裩�a�L���hv�(�GS���H���i_�m( (�k�@�o�9,7rU��/N��wF�Xu����5?J����{�g�'������\>��?��M<���0�����-�� ����ϰp�����`p�@I�d�RL��U���"m�����U��o���Ti9��{��.�IީIN?M��j����2�����"���Y����~� ���������� ��_             x������ � �         �   x�=�K
�0 �/��Ɨg��U��n� �	4J�|�(���M�3�x��'D��q��{���,|�H�2'�����e����1���R7�C�v�Ι5A����A</y'��aVg��V��KH�H�%��JL�5�gAԪ���*��]�:��<x/G         s   x�3�tr�pt�t�Sp�s
2�C}<C<9�

J�3�RSJ�r+9��u��45�2M8Sr3�8K8c��F��f��
��V��V��z斖��� �?�=... FCj         p  x���K��8��=����iR~�Wn�;�2PΤr�mc�iR�O�8���.�U.���u���[]�}�9{�E��|��#�@n2��~���Nop�������w��;�w��p<���~�z{ʣ�^SKf��Cjܐ0^�B�2�� ���#�=ϳ<a��Cp]}��2#����o+#���or y�� {���O�IM��\����\�%e�Z�vi��@�G:V!n��*��W�"c�����gG���J�3��d��a;ƍ�(8߻�G3��g�U�]Mu����=z}r���A��?
�Y9F�!��J��5�*3Pw�B�A�$%ð %��*�2��蛐`�_���+�7ã��j�D��<I�F�
�B�fT����O�lv2��
J��s&���%�d,�3����7�����a�_��6��_묉�>8AN�-�����_��y�60�̬���1�|v�;�y��F��ڀ�����$���(ޙ�7xi��Hy�=jݍĜ���,̠J���b?��:��I�p�&զ�gy�[A������-�|K1-x�8�㉑�>�v��@ϼE.S�X��Q��ʿ��(�-.i������0���.r����r}A_�Y��$o���ek�%���w��fz�_Fcv���[5� ������#���/?�ź�m�>%�+�4�J�pm�0��������~�s�g��4�f�	�ˊR���Y�l�/�2`w`N�,e�Q�|��/W���Ar�5��.��-��G"�ٛ�����<�߬�:ye
Uk��f����̱娮msǶg�5�)!U��1�~M2j�b��?<ե��C8e�e�R�=����.�]Âe���ս5o��cy?�n������ �ӭ���.D�a^׷������ȭ.���T�j�S�<ꇛ����96'�X!_�W�ngc ��C�gLTsG8��T?;
�E�����jIv/X��T�)�X#d}��TM��<UŮl��s�i����ۣ�F�	���<%^�5�߰�����$e���i]t,��)=�1�z�fӷ!1�R��ȝx煽,������L�^���7='{� ������b�zr�Va�5�6¡f��c��dM}S�	���$5tU3�\��Ljg�p('IMҢ�/��&�
&��R��U���5ġb¹F#|G�S����2]ݤ0�P��M�,p�.����T^ј�m,�
"^�c��0�<��ˉZ�k�U��&����V��`B
�7�y���w��p��o�\�%{􀕺P�J��!'��=���=��������*3��s120��߅�8~��e��^��Q��=�Q�	{{5�ק�F�/����~�"�            x������ � �      &      x������ � �      *      x������ � �      ,      x������ � �      $      x������ � �            x������ � �     