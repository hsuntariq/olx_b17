<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php'
    ?>
    <style>
        .shadow-custom {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        }

        .location-list {
            transition: all 0.2s;
            cursor: pointer;
        }

        .location-list:hover {
            background-color: #C8F8F6 !important;
        }

        .drop-opener {
            cursor: pointer;
        }

        .rotate {
            transform: rotate(180deg);
        }

        .center-position {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width:780px) {
            .sell-btn {
                position: fixed !important;
                bottom: 5% !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
            }
        }
    </style>
    <title>Document</title>
</head>

<body>

    <div class="underlay d-none" style="position:fixed;top:0;left:0;background:transparent;height:100vh;width:100vw;"></div>

    <?php include './header.php' ?>
    <?php include './nav.php' ?>










    <script>
        let drop_opener = document.querySelector('.drop-opener')
        let dropdown = document.querySelector('.location-dropdown')
        let underlay = document.querySelector('.underlay')
        let drop_icon = document.querySelector('.drop-icon')

        drop_opener.addEventListener('click', (e) => {
            dropdown.classList.remove('d-none')
            underlay.classList.remove('d-none')
            drop_icon.classList.toggle('rotate')

            e.stopPropagation()
        })
        drop_icon.addEventListener('click', (e) => {
            e.stopPropagation()
            dropdown.classList.toggle('d-none')
            underlay.classList.toggle('d-none')
            drop_icon.classList.toggle('rotate')
        })


        underlay.addEventListener('click', () => {
            dropdown.classList.add('d-none')
            underlay.classList.add('d-none')
            drop_icon.classList.remove('rotate')
        })
    </script>


</body>

</html>