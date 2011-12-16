<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liupengtao
 * Date: 11-12-5
 * Time: 下午2:59
 * To change this template use File | Settings | File Templates.
 */

$arr = array(
//    "favsites" => array(
//        '小说名站' => array(
//            '起点中文网' => 'http://www.qidian.com/',
//            '小说阅读网' => 'http://www.readnovel.com/',
//            '红袖添香' => 'http://www.hongxiu.com/',
//            '潇湘书院' => 'http://www.xxsy.net/',
//            '今日小说排行榜' => 'http://top.baidu.com/buzz/book.html',
//            '晋江文学' => 'http://www.jjwxc.net/',
//            '言情小说吧' => 'http://www.xs8.cn/',
//            '快眼看书' => 'http://www.booksky.org/',
//            '幻剑书盟' => 'http://hjsm.tom.com/',
//            '网络小说目录' => 'http://tieba.baidu.com/f?ct=536870912&rn=200&pn=0&cm=1101&tn=simpleCategory&sn=%CE%C4%D1%A7%D2%D5%CA%F5',
//            '新浪读书' => 'http://book.sina.com.cn/',
//            '纵横中文网' => 'http://www.zongheng.com/',
//            '看书网' => 'http://www.kanshu.com/',
//            '更多' => ''
//        )
//    ),
    "all_favsites" => array(
        '小说名站' => array(
            '起点中文网' => 'http://www.qidian.com/',
            '小说阅读网' => 'http://www.readnovel.com/',
            '红袖添香' => 'http://www.hongxiu.com/',
            '潇湘书院' => 'http://www.xxsy.net/',
            '今日小说排行榜' => 'http://top.baidu.com/buzz/book.html',
            '晋江文学' => 'http://www.jjwxc.net/',
            '言情小说吧' => 'http://www.xs8.cn/',
            '快眼看书' => 'http://www.booksky.org/',
            '幻剑书盟' => 'http://hjsm.tom.com/',
            '网络小说目录' => 'http://tieba.baidu.com/f?ct=536870912&rn=200&pn=0&cm=1101&tn=simpleCategory&sn=%CE%C4%D1%A7%D2%D5%CA%F5',
            '新浪读书' => 'http://book.sina.com.cn/',
            '纵横中文网' => 'http://www.zongheng.com/',
            '看书网' => 'http://www.kanshu.com/',
            'Sodu' => 'http://www.sodu.org/',
            '翠微居' => 'http://www.cuiweiju.com/',
            '逐浪小说网' => 'http://www.zhulang.com/',
            '19楼浓情小说' => 'http://www.19lou.com/forum-26-1.html',
            '17k小说网' => 'http://www.17k.com/',
            '连城书盟' => 'http://www.lcread.com/',
            '凤鸣轩小说网' => 'http://www.fmx.cn/',
            '3g书城' => 'http://www.3gsc.com.cn/',
            '四月天小说网' => 'http://www.4yt.net/',
            '烟雨红尘小说网' => 'http://www.cc222.com/',
            '起点女生网' => 'http://www.qdmm.com/',
            '红薯小说阅读' => 'http://www.hongshu.com/',
            '云中书城' => 'http://www.yuncheng.com/',
            '天下电子书' => 'http://www.txdzs.com/',
            '飞库' => 'http://www.feiku.com/',
            '糯米TXT论坛' => 'http://txt.nokiacn.net/',
            '狗狗书籍' => 'http://book.gougou.com/',
            '久久小说网' => 'http://www.txt99.com/',
            '百度文库书店' => 'http://wenku.baidu.com/book/index',
            '派派小说论坛' => 'http://www.paipaitxt.com/',
            '书香门第TXT' => 'http://bbs.txtnovel.com/',
            '爱txt电子书论坛' => 'http://www.aitxt.com/',
            'txt论坛' => 'http://www.txtbbs.com/',
            '阿巴达电子书' => 'http://www.abada.cn/',
            '书香电子书' => 'http://www.sxcnw.net/',
            '评书吧' => 'http://www.pingshu8.com/',
            '中华听书网' => 'http://www.cntingshu.com/',
            '听中国' => 'http://www.tingchina.com/',
            '畅听网' => 'http://www.ting85.com/',
            '天方听书' => 'http://www.tingbook.com/',
            '腾讯读书' => 'http://book.qq.com/',
            '搜狐读书' => 'http://book.sohu.com/',
            '读者' => 'http://www.duzhe.com/',
            '且听风吟' => 'http://wind.yinsha.com/',
            '青年文摘' => 'http://www.qnwz.cn/',
            '百度文库' => 'http://wenku.baidu.com/',
            '莲蓬鬼话' => 'http://www.tianya.cn/techforum/articleslist/0/16.shtml',
            '好心情美文站' => 'http://www.goodmood.cn/',
            '国家图书馆' => 'http://www.nlc.gov.cn/',
            '天涯在线书库' => 'http://www.tianyabook.com/',
            '凤凰读书' => 'http://book.ifeng.com/',
            '豆瓣读书' => 'http://book.douban.com/ ',
            '豆丁文库' => 'http://www.docin.com/',
            '故事会' => 'http://www.storychina.cn/',
            '意林' => 'http://www.yilin.net.cn/',
            '新浪爱问共享' => 'http://ishare.iask.sina.com.cn/',
            '榕树下' => 'http://www.rongshuxia.com/',
            '收起' => ''
        )
    ),
    "curfilters" =>array(
        'types' => '武侠'
    ),
    "filters" => array(
        "types" => array(
            'name' => '类型',
            'id' => 'filter_lx',
            'items' => array(
                'default' => '全部',
                '玄幻' => '玄幻',
                '奇幻' => '奇幻',
                '武侠' => '武侠',
                '仙侠' => '仙侠',
                '都市' => '都市',
                '言情' => '言情',
                '历史' => '历史',
                '军事' => '军事',
                '游戏' => '游戏',
                '竞技' => '竞技',
                '科幻' => '科幻',
                '灵异' => '灵异',
                '悬疑' => '悬疑',
                '推理' => '推理',
                '耽美' => '耽美',
                '同人' => '同人',
                '其他' => '其他'
            )
        ),
        "charge" => array(
            'name' => '收费',
            'id' => 'filter_sf',
            'items' => array(
                'default' => '全部',
                '收费' => '收费',
                '免费' => '免费'
            )
        )
    ),
    "datas" => array(
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。',
            'id' => 1,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 1
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 2,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 2
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 3,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 3
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 4,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 4
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 5,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 5
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 6,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 6
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 7,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 7
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 8,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 8
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 9,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 9
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 10,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 10
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 11,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 11
        ),
        array(
            'title' => '季迪恩烈火',
            'url' => 'http://www.qidian.com/Book/2056874.aspx',
            'poster' => 'static/xs/images/bubujingxin.jpg',
            'author' => '桐华',
            'word_count' => '8万字',
            'status' => '已完结',
            'update_status' => '连载完毕',
            'desc' => '《步步惊心》是桐华所著清穿小说。2005年起在晋江原创网连载，2006年出版，2009年、2011年两度修订再版。2011年独家电子版权签约起点女生网。“清穿三座大山”之一，被誉为“清穿扛鼎之作”，有评论称“在整个穿越史上，《步步惊心》绝对是一部标志性的作品，它独具风格的历史演义和凄美绝伦的爱情架构结合得天衣无缝，从而摆脱了一般言情小说的窠臼，而更像一部传奇”。小说的电视剧改编版权2009年转让，同名电视剧由上海唐人电影制作有限公司拍摄制作。',
            'id' => 12,
            'author_url' => 'http://www.baidu.com',
            'author_id' => 12
        )
    ),
    "recommends" => array(
        "frees" => array(
            array(
                'id' =>1,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>2,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>3,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>4,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>5,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>6,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>7,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>8,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>9,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>10,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            )
        ),
        "ends" => array(
            array(
                'id' =>11,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>12,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>13,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>14,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>15,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>16,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>17,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>18,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>19,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>20,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            )
        ),
        "girls" => array(
            array(
                'id' =>21,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>22,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>23,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>24,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>25,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>26,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>27,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>28,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>29,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
                'url' => 'www.hao123.com/book'
            ),
            array(
                'id' =>30,
                'type' => '侦探',
                'title' => '急铁烈火爱伦坡',
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