<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-5
 * Time: ����2:59
 * To change this template use File | Settings | File Templates.
 */

$arr = array(
//    "favsites" => array(
//        'С˵��վ' => array(
//            '���������' => 'http://www.qidian.com/',
//            'С˵�Ķ���' => 'http://www.readnovel.com/',
//            '��������' => 'http://www.hongxiu.com/',
//            '������Ժ' => 'http://www.xxsy.net/',
//            '����С˵���а�' => 'http://top.baidu.com/buzz/book.html',
//            '������ѧ' => 'http://www.jjwxc.net/',
//            '����С˵��' => 'http://www.xs8.cn/',
//            '���ۿ���' => 'http://www.booksky.org/',
//            '�ý�����' => 'http://hjsm.tom.com/',
//            '����С˵Ŀ¼' => 'http://tieba.baidu.com/f?ct=536870912&rn=200&pn=0&cm=1101&tn=simpleCategory&sn=%CE%C4%D1%A7%D2%D5%CA%F5',
//            '���˶���' => 'http://book.sina.com.cn/',
//            '�ݺ�������' => 'http://www.zongheng.com/',
//            '������' => 'http://www.kanshu.com/',
//            '����' => ''
//        )
//    ),
    "all_favsites" => array(
        'С˵��վ' => array(
            '���������' => 'http://www.qidian.com/',
            'С˵�Ķ���' => 'http://www.readnovel.com/',
            '��������' => 'http://www.hongxiu.com/',
            '������Ժ' => 'http://www.xxsy.net/',
            '����С˵���а�' => 'http://top.baidu.com/buzz/book.html',
            '������ѧ' => 'http://www.jjwxc.net/',
            '����С˵��' => 'http://www.xs8.cn/',
            '���ۿ���' => 'http://www.booksky.org/',
            '�ý�����' => 'http://hjsm.tom.com/',
            '����С˵Ŀ¼' => 'http://tieba.baidu.com/f?ct=536870912&rn=200&pn=0&cm=1101&tn=simpleCategory&sn=%CE%C4%D1%A7%D2%D5%CA%F5',
            '���˶���' => 'http://book.sina.com.cn/',
            '�ݺ�������' => 'http://www.zongheng.com/',
            '������' => 'http://www.kanshu.com/',
            'Sodu' => 'http://www.sodu.org/',
            '��΢��' => 'http://www.cuiweiju.com/',
            '����С˵��' => 'http://www.zhulang.com/',
            '19¥Ũ��С˵' => 'http://www.19lou.com/forum-26-1.html',
            '17kС˵��' => 'http://www.17k.com/',
            '��������' => 'http://www.lcread.com/',
            '������С˵��' => 'http://www.fmx.cn/',
            '3g���' => 'http://www.3gsc.com.cn/',
            '������С˵��' => 'http://www.4yt.net/',
            '����쳾С˵��' => 'http://www.cc222.com/',
            '���Ů����' => 'http://www.qdmm.com/',
            '����С˵�Ķ�' => 'http://www.hongshu.com/',
            '�������' => 'http://www.yuncheng.com/',
            '���µ�����' => 'http://www.txdzs.com/',
            '�ɿ�' => 'http://www.feiku.com/',
            'Ŵ��TXT��̳' => 'http://txt.nokiacn.net/',
            '�����鼮' => 'http://book.gougou.com/',
            '�þ�С˵��' => 'http://www.txt99.com/',
            '�ٶ��Ŀ����' => 'http://wenku.baidu.com/book/index',
            '����С˵��̳' => 'http://www.paipaitxt.com/',
            '�����ŵ�TXT' => 'http://bbs.txtnovel.com/',
            '��txt��������̳' => 'http://www.aitxt.com/',
            'txt��̳' => 'http://www.txtbbs.com/',
            '���ʹ������' => 'http://www.abada.cn/',
            '���������' => 'http://www.sxcnw.net/',
            '�����' => 'http://www.pingshu8.com/',
            '�л�������' => 'http://www.cntingshu.com/',
            '���й�' => 'http://www.tingchina.com/',
            '������' => 'http://www.ting85.com/',
            '�췽����' => 'http://www.tingbook.com/',
            '��Ѷ����' => 'http://book.qq.com/',
            '�Ѻ�����' => 'http://book.sohu.com/',
            '����' => 'http://www.duzhe.com/',
            '��������' => 'http://wind.yinsha.com/',
            '������ժ' => 'http://www.qnwz.cn/',
            '�ٶ��Ŀ�' => 'http://wenku.baidu.com/',
            '�����' => 'http://www.tianya.cn/techforum/articleslist/0/16.shtml',
            '����������վ' => 'http://www.goodmood.cn/',
            '����ͼ���' => 'http://www.nlc.gov.cn/',
            '�����������' => 'http://www.tianyabook.com/',
            '��˶���' => 'http://book.ifeng.com/',
            '�������' => 'http://book.douban.com/ ',
            '�����Ŀ�' => 'http://www.docin.com/',
            '���»�' => 'http://www.storychina.cn/',
            '����' => 'http://www.yilin.net.cn/',
            '���˰��ʹ���' => 'http://ishare.iask.sina.com.cn/',
            '������' => 'http://www.rongshuxia.com/',
            '����' => ''
        )
    ),
    "curfilters" =>array(
        'types' => '����'
    ),
    "filters" => array(
        "types" => array(
            'name' => '����',
            'id' => 'filter_lx',
            'items' => array(
                'default' => 'ȫ��',
                '����' => '����',
                '���' => '���',
                '����' => '����',
                '����' => '����',
                '����' => '����',
                '����' => '����',
                '��ʷ' => '��ʷ',
                '����' => '����',
                '��Ϸ' => '��Ϸ',
                '����' => '����',
                '�ƻ�' => '�ƻ�',
                '����' => '����',
                '����' => '����',
                '����' => '����',
                '����' => '����',
                'ͬ��' => 'ͬ��',
                '����' => '����'
            )
        ),
        "charge" => array(
            'name' => '�շ�',
            'id' => 'filter_sf',
            'items' => array(
                'default' => 'ȫ��',
                '�շ�' => '�շ�',
                '���' => '���'
            )
        )
    ),
    "datas" => array(
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��',
            'id' => 1,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 1
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 2,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 2
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 3,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 3
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 4,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 4
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 5,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 5
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 6,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 6
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 7,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 7
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 8,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 8
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 9,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 9
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 10,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 10
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 11,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 11
        ),
        array(
            'title' => '���϶��һ�',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => 'ͩ��',
            'word_count' => '8����',
            'status' => '�����',
            'update_status' => '�������',
            'desc' => '���������ġ���ͩ�������崩С˵��2005�����ڽ���ԭ�������أ�2006����棬2009�ꡢ2011�������޶��ٰ档2011����ҵ��Ӱ�ȨǩԼ���Ů���������崩������ɽ��֮һ������Ϊ���崩����֮�����������۳ơ���������Խʷ�ϣ����������ġ�������һ����־�Ե���Ʒ�������߷�����ʷ������������׵İ���ܹ���ϵ������޷죬�Ӷ�������һ������С˵���ʣ�������һ�����桱��С˵�ĵ��Ӿ�ı��Ȩ2009��ת�ã�ͬ�����Ӿ����Ϻ����˵�Ӱ�������޹�˾����������',
            'id' => 12,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 12
        )
    ),
    "recommends" => array(
        "frees" => array(
            array(
                'id' =>1,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>2,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>3,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>4,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>5,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>6,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>7,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>8,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>9,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>10,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            )
        ),
        "ends" => array(
            array(
                'id' =>11,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>12,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>13,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>14,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>15,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>16,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>17,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>18,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>19,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>20,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            )
        ),
        "girls" => array(
            array(
                'id' =>21,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>22,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>23,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>24,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>25,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>26,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>27,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>28,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>29,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>30,
                'type' => '��̽',
                'title' => '�����һ�����',
                'url' => 'www.hao123.com/book'
            )
        )
    ),
    "page" => array(
        'pn' => 2,
        'count' => 76,
        'rn' => 24
    )
);