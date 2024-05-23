list = document.querySelectorAll('.carousel');

for (let item of list)
{
    let container = item.querySelector('.container');
    let width = container.offsetWidth;
    let scrollend = true;

    item.querySelector('.side.left button').addEventListener('click', () =>
    {
        if (scrollend)
        {
            if (container.scrollLeft == 0)
            {
                container.scrollLeft = container.scrollWidth - width;
            }
            else
            {
                container.scrollLeft -= width + 10;
            }

            if ('onscrollend' in window)
            {
                scrollend = false;
            }
        }
    });

    item.querySelector('.side.right button').addEventListener('click', () =>
    {
        if (scrollend)
        {
            if (container.scrollLeft == (container.scrollWidth - width))
            {
                container.scrollLeft = 0;
            }
            else
            {
                container.scrollLeft += width + 10;
            }

            if ('onscrollend' in window)
            {
                scrollend = false;
            }
        }
    });

    if ('onscrollend' in window)
    {
        container.addEventListener('scrollend', () =>
        {
            scrollend = true;
        });
    }
}