//ハンバーガーメニュー
const target = document.getElementById("nav__menu");
target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("hnav");
    nav.classList.toggle('in');
});

//search
/* エリアセレクトBOX */
(function(){
    ("#input_area").change(function(){
        ("#submit_form").submit();
    });
});

/* ジャンルセレクトBOX */
(function(){
    ("#input_genre").change(function(){
        ("#submit_form").submit();
    });
});

/* search */
(function(){
    ("#input_name").change(function(){
        ("#submit_form").submit();
    });
});