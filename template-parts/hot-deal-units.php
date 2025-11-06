<?php
$pj_key = $args[0]; // project key
$posts = $args[1]; // posts
$cont = $args[2] == "container"; // container
// pre($args[0]);
?>

<?php if ($pj_key == 0) { ?>
    <style>
        .-units-mob-wrap {
            --cont-m: calc(100% - var(--cont-w));
            overflow: hidden;
        }

        .-units-mob-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        

        .-units-mob-nav {
            display: flex;
            justify-content: center;
        }

        .-units-mob-nav .-nav {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            margin: 0 3px;
            cursor: pointer;
        }

        .-units-mob-nav .-nav div {
            width: 100%;
            height: 1px;
            background-color: var(--ci-blue-600);
            transition: all .3s;
        }

        .-units-mob-nav .-nav.-active div {
            height: 4px;
            background-color: var(--ci-veri-500);

        }

        .-nav.hid {
            display: none !important;
        }

        .-units-mob {
            --cards-slide: 1;
            --card-width: calc(((100% - (12px * (var(--cards) - 1))) / var(--cards)));
            --shift: 0px;
            display: grid;
            will-change: transform;
            grid-gap: 12px;
            grid-template-columns: repeat(var(--max), var(--card-width));
            transform: translateX(calc(var(--cards-slide) * var(--card-width) * var(--i) * -1 + ((var(--cards-slide)) * -12px * var(--i) + var(--shift))));
            transition: all .5s ease-in-out;
            margin: <?= $cont ? '1em 1em 0em 1em' : 'unset' ?>;
        }
    </style>



    <script>
        function unitsNav(pj_key, i) {
            let wrap = document.querySelectorAll(`.-units-mob-wrap[data-pjkey='${pj_key}'] .-units-mob-nav`)
            let nav = document.querySelectorAll(`.-units-mob-wrap[data-pjkey='${pj_key}'] .-units-mob-nav .-nav`)
            nav.forEach((e, i) => {
                e.classList.remove('-active')
            })
            nav[i].classList.add('-active')
            $(`.-units-mob-wrap[data-pjkey='${pj_key}']`).style.setProperty('--i', i)
        }
    </script>
<?php
}
?>

<div class="-units">
    <?php foreach ($posts as $key => $value) {
        get_template_part('template-parts/hot-deal', 'unit-card', $value);
    } ?>
</div>
<div class="-units-mob-wrap" data-pjkey="<?= $pj_key ?>" style="--i: 0;--max: <?= ofsize($posts) ?>;">
    <div class="-units-mob" style=" --cards: <?= ofsize($posts) > 1 ? "1.2" : "1" ?>;">
        <?php foreach ($posts as $key => $value) {
            get_template_part('template-parts/hot-deal', 'unit-card', $value);
        } ?>
    </div>
    <div class="-units-mob-nav">
        <?php
        if (ofsize($posts) > 1) {
            // pre(ofsize($posts));
            for ($i = 0; $i < ofsize($posts); $i++) {
        ?>
                <div class="-nav <?= $i == 0  ? "-active" : "" ?>" onclick="unitsNav(<?= $pj_key ?>,<?= $i ?>)">
                    <div></div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    var el = document.querySelector(".-units-mob-wrap[data-pjkey='<?= $pj_key ?>']");
    var el2 = document.querySelector(".-units-mob-wrap[data-pjkey='<?= $pj_key ?>'] .-units-mob");

    xconsolex.log("el", el);
    xconsolex.log("el2", el2);

    var hammerTime = new Hammer(el);
    xconsolex.log(hammerTime)
    hammerTime.get('pan').set({
        direction: Hammer.DIRECTION_HORIZONTAL
    });
    hammerTime.on("panend", function(ev) {
        let i = document.querySelector(".-units-mob-wrap[data-pjkey='<?= $pj_key ?>']").style.getPropertyValue('--i')
        let max = document.querySelector(".-units-mob-wrap[data-pjkey='<?= $pj_key ?>']").style.getPropertyValue('--max')

        i = parseInt(i)
        max = parseInt(max)
        let di = 0;

        if (ev.deltaX > 20) {
            di = -1
        } else if (ev.deltaX < -20) {
            di = +1
        }

        i = (((i + di) % max) + max) % max

        if (i == max - 1) {
            if (max > 2)
                el2.style.setProperty('--shift', `${(max + 1) * 12}px`)
            else if (max == 2)
                el2.style.setProperty('--shift', `${(max + 2) * 12}px`)

        } else {
            el2.style.setProperty('--shift', `0px`)
        }
        unitsNav(<?= $pj_key ?>, i)
    })
</script>